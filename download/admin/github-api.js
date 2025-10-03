// GitHub API Handler per Cloud Storage
class GitHubFileManager {
    constructor(config) {
        this.username = config.username;
        this.repo = config.repo;
        this.token = config.token;
        this.baseUrl = 'https://api.github.com';
    }

    // Headers per le richieste API
    getHeaders() {
        return {
            'Authorization': `token ${this.token}`,
            'Accept': 'application/vnd.github.v3+json',
            'Content-Type': 'application/json'
        };
    }

    // Upload file
    async uploadFile(file, path, message = 'Upload file') {
        try {
            // Converti file in base64
            const base64Content = await this.fileToBase64(file);
            
            const url = `${this.baseUrl}/repos/${this.username}/${this.repo}/contents/${path}`;
            
            const response = await fetch(url, {
                method: 'PUT',
                headers: this.getHeaders(),
                body: JSON.stringify({
                    message: message,
                    content: base64Content
                })
            });

            if (response.ok) {
                const result = await response.json();
                return { success: true, data: result };
            } else {
                const error = await response.json();
                return { success: false, error: error.message };
            }
        } catch (error) {
            return { success: false, error: error.message };
        }
    }

    // Download file
    async downloadFile(path) {
        try {
            const url = `${this.baseUrl}/repos/${this.username}/${this.repo}/contents/${path}`;
            
            const response = await fetch(url, {
                headers: this.getHeaders()
            });

            if (response.ok) {
                const result = await response.json();
                // Decodifica base64
                const content = atob(result.content);
                return { success: true, content: content, data: result };
            } else {
                return { success: false, error: 'File not found' };
            }
        } catch (error) {
            return { success: false, error: error.message };
        }
    }

    // Lista file in una directory
    async listFiles(path = '') {
        try {
            const url = `${this.baseUrl}/repos/${this.username}/${this.repo}/contents/${path}`;
            
            const response = await fetch(url, {
                headers: this.getHeaders()
            });

            if (response.ok) {
                const files = await response.json();
                return { success: true, files: files };
            } else {
                return { success: false, error: 'Directory not found' };
            }
        } catch (error) {
            return { success: false, error: error.message };
        }
    }

    // Elimina file
    async deleteFile(path, message = 'Delete file') {
        try {
            // Prima ottieni il file per avere lo SHA
            const fileInfo = await this.downloadFile(path);
            if (!fileInfo.success) {
                return { success: false, error: 'File not found' };
            }

            const url = `${this.baseUrl}/repos/${this.username}/${this.repo}/contents/${path}`;
            
            const response = await fetch(url, {
                method: 'DELETE',
                headers: this.getHeaders(),
                body: JSON.stringify({
                    message: message,
                    sha: fileInfo.data.sha
                })
            });

            if (response.ok) {
                return { success: true };
            } else {
                const error = await response.json();
                return { success: false, error: error.message };
            }
        } catch (error) {
            return { success: false, error: error.message };
        }
    }

    // Sposta file (elimina dalla posizione vecchia e crea in quella nuova)
    async moveFile(oldPath, newPath, message = 'Move file') {
        try {
            // Scarica il file dalla posizione vecchia
            const fileInfo = await this.downloadFile(oldPath);
            if (!fileInfo.success) {
                return { success: false, error: 'Source file not found' };
            }

            // Carica il file nella nuova posizione
            const uploadResult = await this.uploadFile(
                { name: fileInfo.data.name, content: fileInfo.content },
                newPath,
                message
            );

            if (uploadResult.success) {
                // Elimina il file dalla posizione vecchia
                await this.deleteFile(oldPath, message);
                return { success: true };
            } else {
                return { success: false, error: uploadResult.error };
            }
        } catch (error) {
            return { success: false, error: error.message };
        }
    }

    // Utility: converti file in base64
    fileToBase64(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => {
                const base64 = reader.result.split(',')[1];
                resolve(base64);
            };
            reader.onerror = reject;
            reader.readAsDataURL(file);
        });
    }

    // Utility: ottieni URL diretto per download
    getDownloadUrl(path) {
        return `https://raw.githubusercontent.com/${this.username}/${this.repo}/main/${path}`;
    }

    // Statistiche repository
    async getStats() {
        try {
            const url = `${this.baseUrl}/repos/${this.username}/${this.repo}`;
            
            const response = await fetch(url, {
                headers: this.getHeaders()
            });

            if (response.ok) {
                const repo = await response.json();
                return {
                    success: true,
                    stats: {
                        size: repo.size,
                        stars: repo.stargazers_count,
                        forks: repo.forks_count,
                        lastUpdate: repo.updated_at
                    }
                };
            } else {
                return { success: false, error: 'Repository not found' };
            }
        } catch (error) {
            return { success: false, error: error.message };
        }
    }
}

// Configurazione (da aggiornare con i tuoi dati)
const GITHUB_CONFIG = {
    username: 'TUO_USERNAME', // Sostituisci con il tuo username
    repo: 'sevc0n-files',     // Nome repository (puoi cambiarlo)
    token: 'TUO_TOKEN'        // Il tuo Personal Access Token
};

// Inizializza il file manager
const fileManager = new GitHubFileManager(GITHUB_CONFIG);

// Export per uso in altri file
window.GitHubFileManager = GitHubFileManager;
window.fileManager = fileManager;

