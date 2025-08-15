
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kiểm Tra Tài Khoản Facebook</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 40px 20px;
    }

    h1 {
      color: #00e0ff;
      margin-bottom: 20px;
      text-align: center;
    }

    #inputBox {
      display: flex;
      flex-direction: column;
      width: 100%;
      max-width: 500px;
      gap: 10px;
    }

    input, button {
      padding: 12px;
      font-size: 16px;
      border-radius: 8px;
      border: none;
      outline: none;
    }

    input {
      width: 100%;
    }

    button {
      background-color: #00adb5;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #007e85;
    }

    #result {
      margin-top: 30px;
      background-color: rgba(255, 255, 255, 0.05);
      border-radius: 10px;
      padding: 20px;
      max-width: 600px;
      width: 100%;
      display: none;
      text-align: left;
    }

    img {
      border-radius: 50%;
      margin: 10px 0;
      border: 3px solid #00e0ff;
    }

    .note {
      margin-top: 40px;
      font-size: 15px;
      text-align: center;
      max-width: 500px;
    }

    a {
      color: #00e0ff;
      text-decoration: none;
      border-bottom: 1px dashed #00e0ff;
    }

    .loader {
      border: 4px solid #f3f3f3;
      border-top: 4px solid #00e0ff;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      animation: spin 1s linear infinite;
      margin: 0 auto 10px;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
</head>
<body>
  <h1>Kiểm Tra Tài Khoản Facebook</h1>
  <div id="inputBox">
    <input type="text" id="fbInput" placeholder="Nhập ID hoặc Link Facebook...">
    <button onclick="handleSubmit()">Kiểm Tra</button>
  </div>

  <div id="result"></div>



  <script>
    document.addEventListener('keydown', function(e) {
    if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && ['I','J','C'].includes(e.key.toUpperCase())) || (e.ctrlKey && e.key.toUpperCase() === 'U')) {
        e.preventDefault(); alert('Tính năng bị chặn!');
    }
  });

  setInterval(() => {
    if (window.outerWidth - window.innerWidth > 160 || window.outerHeight - window.innerHeight > 160) {
        document.body.innerHTML = '<h1 style="color:red;text-align:center;">🚫 DevTools bị chặn!</h1>';
    }
  }, 1000);
    async function handleSubmit() {
      const input = document.getElementById("fbInput").value.trim();
      const resultBox = document.getElementById("result");
      resultBox.style.display = "block";
      resultBox.innerHTML = '<div class="loader"></div>Đang xử lý...';

      if (!input) {
        resultBox.innerHTML = "⚠️ Vui lòng nhập ID hoặc link Facebook.";
        return;
      }

      const isNumeric = /^[0-9]+$/.test(input);

      let id = input;
      if (!isNumeric) {
        try {
          const idRes = await fetch(`https://anhcode.sbs/anhcode/api/facebook/layid.php?url=${encodeURIComponent(input)}`);
          const idData = await idRes.json();
          if (idData.error === 0) {
            id = idData.id;
          } else {
            resultBox.innerHTML = "❌ Không thể lấy ID từ liên kết.";
            return;
          }
        } catch (e) {
          resultBox.innerHTML = "⚠️ Lỗi khi lấy ID từ liên kết.";
          return;
        }
      }

      try {
        const res = await fetch(`https://anhcode.sbs/anhcode/api/facebook/check.php?id=${id}`);
        const data = await res.json();

        if (data.status === "success") {
          const info = data.result;
          resultBox.innerHTML = `
            <h2>Thông Tin Tài Khoản</h2>
            <img src="${info.picture.data.url}" width="100" height="100"><br>
            <strong>Họ tên:</strong> ${info.name}<br>
            <strong>ID:</strong> ${info.id}<br>
            <strong>Username:</strong> ${info.username}<br>
            <strong>Link:</strong> <a href="${info.link}" target="_blank">${info.link}</a><br>
            <strong>Địa chỉ:</strong> ${info.location?.name || "Không rõ"}<br>
            <strong>Quê quán:</strong> ${info.hometown?.name || "Không rõ"}<br>
            <strong>Trường:</strong> ${info.education?.[0]?.school?.name || "Không rõ"}<br>
            <strong>Công việc:</strong> ${info.work?.[0]?.employer?.name || "Không rõ"}<br>
            <strong>Ngôn ngữ:</strong> ${info.locale}<br>
            <strong>Đã xác minh:</strong> ${info.is_verified ? "Có" : "Không"}<br>
            <strong>Người theo dõi:</strong> ${info.followers}<br>
            <strong>Ngày tạo:</strong> ${info.created_time}<br>
            <strong>Cập nhật:</strong> ${info.updated_time}<br>
            <hr>
            <em>API by <a href="${data.Admin.Youtube}" target="_blank">${data.Admin.Author}</a></em>
          `;
        } else {
          resultBox.innerHTML = "❌ Không tìm thấy tài khoản hoặc lỗi API.";
        }
      } catch (error) {
        resultBox.innerHTML = "⚠️ Lỗi kết nối API. Vui lòng thử lại.";
      }
    }
  </script>
</body>
</html>
