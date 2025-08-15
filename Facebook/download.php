
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Facebook Video Download | Anh Code</title>
  <style>
    body {
      background-color: #1a1a2e;
      color: white;
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    .container {
      max-width: 700px;
      margin: auto;
      background-color: #16213e;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }

    h1 {
      text-align: center;
      color: #00f7ff;
    }

    .input-group {
      display: flex;
      margin-top: 10px;
      border-radius: 8px;
      overflow: hidden;
      border: none;
    }

    .input-group input[type="text"] {
      flex: 1;
      padding: 10px;
      font-size: 15px;
      border: none;
      outline: none;
    }

    .input-group button {
      background-color: #00b894;
      color: black;
      font-weight: bold;
      border: none;
      padding: 0 12px;
      font-size: 15px;
      cursor: pointer;
    }

    button.download {
      margin-top: 15px;
      width: 100%;
      padding: 12px;
      background-color: #00f7ff;
      color: black;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
    }

    video {
      margin-top: 20px;
      width: 100%;
      border-radius: 12px;
    }

    .download-buttons {
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
    }

    .download-buttons a {
      flex: 1;
      text-align: center;
      padding: 12px;
      margin: 5px;
      background-color: #0f3460;
      color: white;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
    }

    .status {
      text-align: center;
      margin-top: 15px;
      font-style: italic;
      color: #00f7ff;
    }

    .spinner {
      margin: 10px auto;
      border: 4px solid #f3f3f3;
      border-top: 4px solid #00f7ff;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .error {
      color: red;
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Tải Video Facebook</h1>

    <div class="input-group">
      <input type="text" id="fbLink" placeholder="Nhập link video Facebook tại đây...">
      <button onclick="pasteClipboard()">📋</button>
    </div>

    <button class="download" onclick="downloadVideo()">Lấy Video</button>

    <div class="status" id="loadingStatus"></div>
    <div class="spinner" id="spinner" style="display: none;"></div>

    <div id="videoContainer"></div>
    <div class="download-buttons" id="downloadLinks" style="display: none;"></div>
    <div class="error" id="errorMessage"></div>
  </div>

  <script>
    async function pasteClipboard() {
      try {
        const text = await navigator.clipboard.readText();
        document.getElementById("fbLink").value = text;
      } catch (err) {
        alert("Không thể truy cập clipboard!");
      }
    }

    async function downloadVideo() {
      const link = document.getElementById("fbLink").value.trim();
      const videoContainer = document.getElementById("videoContainer");
      const downloadLinks = document.getElementById("downloadLinks");
      const errorMessage = document.getElementById("errorMessage");
      const loadingStatus = document.getElementById("loadingStatus");
      const spinner = document.getElementById("spinner");

      // Reset UI
      videoContainer.innerHTML = "";
      downloadLinks.style.display = "none";
      errorMessage.textContent = "";
      loadingStatus.textContent = "";
      spinner.style.display = "none";

      if (!link) {
        errorMessage.textContent = "Vui lòng nhập link video Facebook.";
        return;
      }

      // Show loading
      loadingStatus.textContent = "Đang lấy dữ liệu...";
      spinner.style.display = "block";

      try {
        const response = await fetch("https://anhcode.sbs/anhcode/api/facebook/down.php?url=" + encodeURIComponent(link));
        const data = await response.json();

        spinner.style.display = "none";
        loadingStatus.textContent = "";

        if (!data.success || !data.links) {
          errorMessage.textContent = "Không lấy được video. Kiểm tra lại link.";
          return;
        }

        const videoUrl = data.links["Tải về chất lượng cao"] || data.links["Tải về chất lượng thấp"];
        if (!videoUrl) {
          errorMessage.textContent = "Video không có sẵn hoặc bị giới hạn.";
          return;
        }

        videoContainer.innerHTML = `
          <video controls>
            <source src="${videoUrl}" type="video/mp4">
            Trình duyệt của bạn không hỗ trợ video.
          </video>
        `;

        let html = "";
        if (data.links["Tải về chất lượng thấp"]) {
          html += `<a href="${data.links["Tải về chất lượng thấp"]}" target="_blank">Tải thấp</a>`;
        }
        if (data.links["Tải về chất lượng cao"]) {
          html += `<a href="${data.links["Tải về chất lượng cao"]}" target="_blank">Tải HD</a>`;
        }

        downloadLinks.innerHTML = html;
        downloadLinks.style.display = "flex";

      } catch (error) {
        spinner.style.display = "none";
        loadingStatus.textContent = "";
        errorMessage.textContent = "Lỗi khi gọi API hoặc lỗi mạng.";
      }
    }

    // Anti F12 + DevTools
    document.addEventListener('keydown', function(e) {
      if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && ['I', 'J', 'C'].includes(e.key.toUpperCase())) || (e.ctrlKey && e.key.toUpperCase() === 'U')) {
        e.preventDefault(); alert('🚫 Tính năng bị chặn!');
      }
    });
    document.addEventListener('contextmenu', e => { e.preventDefault(); alert('🚫 Chuột phải đã bị chặn!'); });
    setInterval(() => {
      if (window.outerWidth - window.innerWidth > 160 || window.outerHeight - window.innerHeight > 160) {
        document.body.innerHTML = '<h1 style="color:red;text-align:center;margin-top:20%;">🚫 DevTools bị chặn!</h1>';
      }
    }, 1000);
  </script>
</body>
</html>
