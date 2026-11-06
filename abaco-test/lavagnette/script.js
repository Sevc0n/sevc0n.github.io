const palette = [
  [249,255,254],[249,128,29],[199,78,189],[58,179,218],
  [254,216,61],[128,199,31],[243,139,170],[71,79,82],
  [157,157,151],[22,156,156],[137,50,184],[60,68,170],
  [131,84,50],[94,124,22],[176,46,38],[29,29,33]
];

const fileInput = document.getElementById('f');
const widthInput = document.getElementById('w');
const heightInput = document.getElementById('h');
const lockRatio = document.getElementById('lock');
const algorithm = document.getElementById('alg');
const convertButton = document.getElementById('go');
const downloadLink = document.getElementById('dl');
const originalCanvas = document.getElementById('o');
const outputCanvas = document.getElementById('c');
const status = document.getElementById('status');
const image = new Image();

let aspectRatio = 1;
let imageLoaded = false;
let objectUrl = null;

const diffusion = [
  [1, 0, 7 / 16],
  [-1, 1, 3 / 16],
  [0, 1, 5 / 16],
  [1, 1, 1 / 16]
];

function isValidDimension(value) {
  const number = Number(value);
  return Number.isSafeInteger(number) && number >= 1 && number <= 2048;
}

function showPlaceholder(id, visible) {
  document.getElementById(id).style.display = visible ? 'block' : 'none';
}

function findNearestColorIndex(r, g, b) {
  let bestIndex = 0;
  let bestDistance = Infinity;

  for (let i = 0; i < palette.length; i++) {
    const color = palette[i];
    const dr = r - color[0];
    const dg = g - color[1];
    const db = b - color[2];
    const distance = dr * dr + dg * dg + db * db;

    if (distance < bestDistance) {
      bestDistance = distance;
      bestIndex = i;
    }
  }

  return bestIndex;
}

fileInput.addEventListener('change', event => {
  const file = event.target.files && event.target.files[0];
  if (!file) return;

  imageLoaded = false;
  convertButton.disabled = true;
  downloadLink.classList.add('disabled');
  downloadLink.removeAttribute('href');
  outputCanvas.style.display = 'none';
  showPlaceholder('output-placeholder', true);

  if (!file.type.startsWith('image/')) {
    status.textContent = 'Seleziona un file immagine valido.';
    return;
  }

  if (objectUrl) URL.revokeObjectURL(objectUrl);
  objectUrl = URL.createObjectURL(file);

  image.onload = () => {
    imageLoaded = true;
    aspectRatio = image.width / image.height;

    widthInput.value = image.width;
    heightInput.value = image.height;

    // La preview non deve duplicare in memoria immagini sorgente enormi.
    const previewScale = Math.min(1, 1400 / image.width, 1400 / image.height);
    originalCanvas.width = Math.max(1, Math.round(image.width * previewScale));
    originalCanvas.height = Math.max(1, Math.round(image.height * previewScale));

    const previewContext = originalCanvas.getContext('2d');
    if (!previewContext) {
      imageLoaded = false;
      status.textContent = 'Il browser non è riuscito a preparare la preview.';
      return;
    }

    previewContext.clearRect(0, 0, originalCanvas.width, originalCanvas.height);
    previewContext.drawImage(image, 0, 0, originalCanvas.width, originalCanvas.height);
    originalCanvas.style.display = 'block';
    showPlaceholder('source-placeholder', false);

    document.getElementById('file-name').textContent = file.name;
    document.getElementById('source-size').textContent = image.width + ' × ' + image.height;
    convertButton.disabled = false;
    status.textContent = 'Immagine caricata: imposta le dimensioni e converti.';
  };

  image.onerror = () => {
    imageLoaded = false;
    convertButton.disabled = true;
    status.textContent = 'Impossibile leggere l’immagine selezionata.';
  };

  image.src = objectUrl;
});

widthInput.addEventListener('input', () => {
  if (lockRatio.checked && isValidDimension(widthInput.value)) {
    heightInput.value = Math.max(1, Math.round(Number(widthInput.value) / aspectRatio));
  }
});

heightInput.addEventListener('input', () => {
  if (lockRatio.checked && isValidDimension(heightInput.value)) {
    widthInput.value = Math.max(1, Math.round(Number(heightInput.value) * aspectRatio));
  }
});

convertButton.addEventListener('click', () => {
  const width = Number(widthInput.value);
  const height = Number(heightInput.value);

  if (!imageLoaded) {
    status.textContent = 'Carica prima un’immagine.';
    return;
  }

  if (!isValidDimension(width) || !isValidDimension(height) || width * height > 3000000) {
    status.textContent = 'Dimensioni non valide: usa interi tra 1 e 2048 e massimo 3 milioni di pixel.';
    return;
  }

  convertButton.disabled = true;
  status.textContent = 'Conversione in corso…';

  requestAnimationFrame(() => {
    try {
      outputCanvas.width = width;
      outputCanvas.height = height;

      const context = outputCanvas.getContext('2d', { willReadFrequently: true });
      if (!context) throw new Error('Canvas non disponibile');

      context.clearRect(0, 0, width, height);
      context.drawImage(image, 0, 0, width, height);

      const imageData = context.getImageData(0, 0, width, height);
      const pixels = imageData.data;
      const useDithering = algorithm.value === 'dither';

      for (let y = 0; y < height; y++) {
        for (let x = 0; x < width; x++) {
          const index = (y * width + x) * 4;
          const red = pixels[index];
          const green = pixels[index + 1];
          const blue = pixels[index + 2];
          const nearest = palette[findNearestColorIndex(red, green, blue)];

          const errorRed = red - nearest[0];
          const errorGreen = green - nearest[1];
          const errorBlue = blue - nearest[2];

          pixels[index] = nearest[0];
          pixels[index + 1] = nearest[1];
          pixels[index + 2] = nearest[2];

          if (useDithering) {
            for (let k = 0; k < diffusion.length; k++) {
              const [dx, dy, factor] = diffusion[k];
              const nextX = x + dx;
              const nextY = y + dy;
              if (nextX < 0 || nextX >= width || nextY >= height) continue;

              const nextIndex = (nextY * width + nextX) * 4;
              pixels[nextIndex] = pixels[nextIndex] + errorRed * factor;
              pixels[nextIndex + 1] = pixels[nextIndex + 1] + errorGreen * factor;
              pixels[nextIndex + 2] = pixels[nextIndex + 2] + errorBlue * factor;
            }
          }
        }
      }

      context.putImageData(imageData, 0, 0);
      outputCanvas.style.display = 'block';
      showPlaceholder('output-placeholder', false);

      document.getElementById('output-size').textContent = width + ' × ' + height;
      downloadLink.href = outputCanvas.toDataURL('image/png');
      downloadLink.download = 'minecraft-palette.png';
      downloadLink.classList.remove('disabled');
      status.textContent = 'Conversione completata. Puoi scaricare il PNG.';
    } catch (error) {
      outputCanvas.style.display = 'none';
      showPlaceholder('output-placeholder', true);
      status.textContent = 'Errore durante la conversione: ' + error.message;
    } finally {
      convertButton.disabled = false;
    }
  });
});
