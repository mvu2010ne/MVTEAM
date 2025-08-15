
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Buff Follow TikTok Free</title>
    <meta name="description" content="Tăng follow TikTok miễn phí chỉ cần username">
    <meta property="og:title" content="Buff Follow TikTok Free">
    <meta property="og:description" content="Tăng follow TikTok tự động và miễn phí">
    <meta property="og:image" content="https://anhcode.sbs/avt.png">
    <meta property="og:url" content="https://anhcode.sbs/">
    <meta property="og:type" content="website">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: #f5f6fa; font-family: 'Segoe UI', sans-serif; text-align: center; margin: 0; padding: 30px; }
        h1 { color: #2f3640; }
        input, button {
            padding: 10px; border-radius: 5px;
            border: 1px solid #ccc; margin: 5px;
        }
        button {
            background-color: #0984e3; color: white;
            font-weight: bold; border: none; cursor: pointer;
        }
        .box {
            background: #dfe6e9;
            border-radius: 10px;
            padding: 20px; margin-top: 30px;
            display: none; min-width: 300px;
        }
        .success { color: green; }
        .error { color: red; }
        footer {
            margin-top: 60px; color: #888;
            font-size: 14px;
        }
        #loading-screen {
            position: fixed; top: 0; left: 0;
            width: 100%; height: 100%;
            background: #000; color: white;
            display: flex; align-items: center; justify-content: center;
            flex-direction: column; z-index: 9999;
            display: none;        }
    </style>
</head>
<body>

<div id="loading-screen">
    <h2>🔄 Đang khởi động công cụ...</h2>
    <p>Vui lòng chờ <span id="countdown">30</span> giây</p>
</div>

<h1>🚀 Buff Follow TikTok Free</h1>
<p>Nhập username TikTok để nhận follow miễn phí</p>

<form id="buff-form">
    <div style="display: flex; justify-content: center; align-items: center; gap: 5px;">
    <input id="username" name="username" placeholder="Ví dụ: m.vu210" required style="flex: 1; max-width: 220px;">
    <button type="button" onclick="pasteClipboard()">📋 Dán</button>
</div>

    <button type="submit">Tăng Follow</button>
</form>

<div id="result" class="box"></div>

<footer>© 2025 Buff TikTok by anhcode</footer>

<script>
// Hàm dán từ clipboard
function pasteClipboard() {
    navigator.clipboard.readText().then(text => {
        document.getElementById("username").value = text.trim();
    }).catch(err => {
        alert("Không thể truy cập clipboard. Vui lòng nhập thủ công!");
        console.error("Clipboard error:", err);
    });
}

// Chống devtools
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

// Delay nếu có

// Gửi AJAX gọi API
document.getElementById("buff-form").addEventListener("submit", function(e) {
    e.preventDefault();
    const username = document.getElementById("username").value.trim();
    if (!username) return alert("Vui lòng nhập username!");

    const loadingScreen = document.getElementById("loading-screen");
    loadingScreen.style.display = "flex";
    document.body.style.overflow = "hidden";

    fetch("", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "ajax=1&username=" + encodeURIComponent(username)
    })
    .then(res => res.json())
    .then(data => {
        loadingScreen.style.display = "none";
        document.body.style.overflow = "auto";

        const box = document.getElementById("result");
        let html = `<h3 style="color:${data.success ? 'green' : 'red'}">${data.success ? '✅' : '❌'} ${data.message}</h3>`;
        if (data.success) {
            html += `
                <p><strong>Username:</strong> ${data.username}</p>
                <p><strong>User ID:</strong> ${data.user_id}</p>
                <p><strong>Nickname:</strong> ${data.nickname}</p>
                <p><strong>Follower trước:</strong> ${data.before}</p>
                <p><strong>Follower sau:</strong> ${data.after}</p>
                <p><strong>Đã tăng:</strong> ${data.increase}</p>
            `;
        } else {
            html += `<p><strong>Username:</strong> ${data.username || username}</p>`;
        }
        box.innerHTML = html;
        box.style.display = "inline-block";
    })
    .catch(err => {
        loadingScreen.style.display = "none";
        document.body.style.overflow = "auto";
        alert("Lỗi kết nối máy chủ!");
        console.error(err);
    });
});
</script>

</body>
</html>
