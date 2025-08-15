
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Tải Video TikTok Không Logo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      padding: 20px;
      margin: 0;
      text-align: center;
    }
    h2 {
      color: #2d3436;
      margin-bottom: 20px;
    }
    form {
      margin-bottom: 20px;
    }
    input {
      padding: 12px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 16px;
      box-sizing: border-box;
      width: 100%;
    }
    button {
      font-size: 16px;
      border: none;
      cursor: pointer;
    }
    .paste-group {
      max-width: 300px;
      margin: 0 auto;
      position: relative;
    }
    .paste-group input {
      width: 100%;
      padding-right: 45px;
    }
    .paste-group button {
      position: absolute;
      top: 0;
      right: 0;
      height: 100%;
      padding: 0 12px;
      background: #00b894;
      color: white;
      font-weight: bold;
      border-radius: 0 6px 6px 0;
    }
    button[type="submit"] {
      background: #0984e3;
      color: white;
      font-weight: bold;
      padding: 12px;
      border-radius: 6px;
      margin-top: 10px;
      width: 100%;
      max-width: 300px;
    }
    .video-box {
      background: white;
      padding: 15px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      max-width: 600px;
      margin: 20px auto;
    }
    video {
      width: 100%;
      border-radius: 10px;
    }
    .download-btn {
      background: #27ae60;
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      display: inline-block;
      margin-top: 10px;
      font-weight: bold;
    }
    .info-box {
      text-align: left;
      margin-top: 15px;
      background: #f1f2f6;
      padding: 15px;
      border-radius: 10px;
    }
    .author {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 10px;
    }
    .author img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
    }
    .stats span {
      display: inline-block;
      margin-right: 15px;
      font-size: 14px;
      color: #444;
    }
    @media (max-width: 480px) {
      .paste-group {
        max-width: 100%;
      }
      .stats span {
        display: block;
        margin: 5px 0;
      }
    }
  </style>
</head>
<body>

  <h2>Tải & Xem Video TikTok Không Logo</h2>

  <form id="download-form">
    <div class="paste-group">
      <input id="url" name="url" placeholder="Dán link TikTok vào đây..." required>
      <button type="button" onclick="pasteClipboard()">📋</button>
    </div>
    <button type="submit">Lấy Video</button>
  </form>

  <div id="result" class="video-box" style="display:none;"></div>

  <script>
  // Chặn DevTools và chuột phải
  document.addEventListener('keydown', function(e) {
    if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && ['I','J','C'].includes(e.key.toUpperCase())) || (e.ctrlKey && e.key.toUpperCase() === 'U')) {
        e.preventDefault(); alert('Tính năng bị chặn!');
    }
  });
  document.addEventListener('contextmenu', e => { e.preventDefault(); alert('Chuột phải đã bị chặn!'); });
  setInterval(() => {
    if (window.outerWidth - window.innerWidth > 160 || window.outerHeight - window.innerHeight > 160) {
        document.body.innerHTML = '<h1 style="color:red;text-align:center;">🚫 DevTools bị chặn!</h1>';
    }
  }, 1000);

  // Hàm dán từ clipboard
  function pasteClipboard() {
    navigator.clipboard.readText().then(text => {
        document.getElementById("url").value = text.trim();
    }).catch(err => {
        alert("Không thể truy cập clipboard. Vui lòng dán thủ công!");
    });
  }

  // Gửi form
  document.getElementById('download-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const url = document.getElementById('url').value.trim();
    if (!url) return alert("Vui lòng nhập link video!");

    const form = new FormData();
    form.append('ajax', 1);
    form.append('url', url);

    const result = document.getElementById('result');
    result.innerHTML = `<p>⏳ Đang xử lý...</p>`;
    result.style.display = 'block';

    fetch('', {
      method: 'POST',
      body: form
    }).then(res => res.json())
      .then(data => {
        if (!data || data.code !== 0 || !data.data) {
          result.innerHTML = `<p style="color:red;">❌ ${data.msg || 'Không thể tải video!'}</p>`;
          return;
        }
        const v = data.data;
        result.innerHTML = `
          <video controls src="${v.play}"></video>
          <a class="download-btn" href="${v.play}" download>Tải Video</a>
          <div class="info-box">
            <strong>🎬 ${v.title}</strong>
            <div class="author">
              <img src="${v.author.avatar}">
              <div>
                <div><strong>${v.author.nickname}</strong></div>
                <div style="font-size:13px;">@${v.author.unique_id}</div>
              </div>
            </div>
            <div class="stats">
              <span>👁️ ${v.play_count}</span>
              <span>❤️ ${v.digg_count}</span>
              <span>💬 ${v.comment_count}</span>
              <span>🔁 ${v.share_count}</span>
            </div>
          </div>
        `;
      })
      .catch(err => {
        result.innerHTML = `<p style="color:red;">❌ Không thể kết nối API!</p>`;
      });
  });
  </script>

</body>
</html>
