
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Công cụ tạo mã QR code nhanh chóng">
    <meta name="keywords" content="website, qr code, tạo mã QR code, công cụ">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Công cụ tạo mã QR code nhanh chóng" />
    <meta property="og:image" content="/avt.png" />
    <title>Tạo Mã QR từ Tin Nhắn</title>
    <link rel="shortcut icon" href="/avt.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
        }

        .bg-card {
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        button {
            cursor: pointer;
            border-radius: 8px;
        }
        
        .bg-primary {
            background-color: #3B82F6;
        }
        
        .text-primary-foreground {
            color: #ffffff;
        }
        
        .bg-primary:hover {
            background-color: #254ab1;
        }
        
        .active-tab {
            background-color: #3B82F6;
            color: white;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        input, select, textarea {
            border: 1px solid #ddd;
            padding: 8px 12px;
            border-radius: 4px;
            width: 100%;
            margin-bottom: 12px;
        }
        
        label {
            display: block;
            margin-bottom: 4px;
            font-weight: 500;
        }

        #qrcodeImg {
            width: 400px;
            height: 400px;
            object-fit: contain;
            border: 10px solid white;
            border-radius: 8px;
            /* box-shadow: 0 4px 10px rgba(0,0,0,0.1); */
        }
    </style>
</head>
<body>
    <div class="container mx-auto px-4 md:px-8 lg:px-16 py-8">
        <div class="rounded-lg border bg-card text-card-foreground shadow-sm mx-auto max-w-2xl" data-v0-t="card">
            <div class="flex flex-col p-6 space-y-1">
                <h3 class="tracking-tight text-2xl font-bold">Tạo Ảnh QR Code</h3>
                <p class="text-sm text-muted-foreground">Chọn loại QR Code bạn muốn tạo</p>
            </div>
            <div class="p-6">
                <div class="flex border-b">
                    <button class="tab-button w-1/3 px-4 py-2 text-center border-r bg-gray-100 text-gray-700 hover:bg-primary/90 active-tab" onclick="switchTab('textQR', this)">Văn Bản</button>
                    <button class="tab-button w-1/3 px-4 py-2 text-center border-r bg-gray-100 text-gray-700 hover:bg-primary/90" onclick="switchTab('wifiQR', this)">WiFi</button>
                    <button class="tab-button w-1/3 px-4 py-2 text-center border-r bg-gray-100 text-gray-700 hover:bg-primary/90" onclick="switchTab('bankQR', this)">Chuyển Khoản</button>
                </div>

                <div id="textQR" class="tab-content p-4 active">
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label for="message">Văn Bản</label>
                            <textarea class="flex h-20 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="message" name="message" placeholder="Nhập văn bản cần tạo QR code" required=""></textarea>
                        </div>
                    </div>
                </div>

                <div id="wifiQR" class="tab-content p-4 hidden">
                    <label for="ssid">Tên WiFi</label>
                    <input id="ssid" type="text" class="w-full p-2 border rounded" placeholder="Nhập tên WiFi">
                    <label for="password">Mật khẩu</label>
                    <input id="password" type="text" class="w-full p-2 border rounded" placeholder="Nhập mật khẩu">
                    <label for="encryption">Loại mã hóa</label>
                    <select id="encryption" class="w-full p-2 border rounded">
                        <option value="WPA">WPA/WPA2</option>
                        <option value="WEP">WEP</option>
                        <option value="">Không mã hóa</option>
                    </select>
                </div>

                <div id="bankQR" class="tab-content p-4">
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label for="bank_id">Ngân hàng   <span style="color: #ef4444; ">*</span></label>
                            <select id="bank_id" class="w-full p-2 border rounded">
                                <option value="">-- Chọn ngân hàng --</option>
                                <!-- Danh sách ngân hàng sẽ được tự động thêm bằng JavaScript -->
                            </select>
                            
                            <label for="account_no">Số tài khoản  <span style="color: #ef4444; ">*</span></label>
                            <input id="account_no" type="text" placeholder="Nhập số tài khoản" class="w-full p-2 border rounded">
                            
                            <label for="account_name">Tên người thụ hưởng</label>
                            <input id="account_name" type="text" placeholder="Nhập tên người thụ hưởng" class="w-full p-2 border rounded">
                            
                            <label for="amount">Số tiền (VND)</label>
                            <input id="amount" type="text" placeholder="Nhập số tiền (nếu có)" class="w-full p-2 border rounded" oninput="formatCurrency(this)">
                            
                            <label for="description">Nội dung chuyển khoản</label>
                            <input id="description" type="text" placeholder="Nhập nội dung chuyển khoản" class="w-full p-2 border rounded">
                            
                            <label for="template">Mẫu QR</label>
                            <select id="template" class="w-full p-2 border rounded">
                                <option value="compact">QR kèm logo VietQR, Napas, ngân hàng</option>
                                <option value="compact2">Mã QR, các logo , thông tin chuyển khoản</option>
                                <option value="qr_only">Trả về ảnh QR đơn giản, chỉ bao gồm QR</option>
                                <option value="print">Mã QR, các logo và đầy đủ thông tin chuyển khoản</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex space-x-2 mt-4">
                    <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full" type="submit" name="generateQR" onclick="generateQR()">
                        <i class="fas fa-qrcode"></i>&nbsp; Tạo QR Code
                    </button>
                    <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full" type="button" onclick="downloadQR()">
                        <i class="fas fa-download"></i>&nbsp; Tải QR Code
                    </button>
                </div>
            </div>
        </div>

        <div class="rounded-lg border bg-card text-card-foreground shadow-sm mx-auto max-w-2xl mt-8" data-v0-t="card">
            <div class="flex flex-col p-6 space-y-1">
                <h3 class="tracking-tight text-2xl font-bold">Ảnh QR Code Của Bạn</h3>
                <p class="text-sm text-muted-foreground">Mã QR Sẽ Được Xuất Hiện Ở Bên Dưới</p>
            </div>
            <div class="p-6">
                <div class="flex justify-center p-4">
                    <img id="qrcodeImg" class="w-64 h-64 mx-auto" src="https://i.imgur.com/U7afLiO.png" alt="QR Code">
                </div>
            </div>
        </div>
        <footer class="mt-6 text-center text-gray-500 text-sm">
            © Vận Hành Bởi <a href="https://t.me/anhcodeclick">Anh Code</a>
        </footer>
    </div>

    <script>
        // Hàm load danh sách ngân hàng từ API
        async function loadBanks() {
            try {
                const response = await fetch('https://api.vietqr.io/v2/banks');
                const data = await response.json();
                
                if (data && data.data) {
                    const bankSelect = document.getElementById('bank_id');
                    const sortedBanks = data.data.sort((a, b) => a.name.localeCompare(b.name));
                    sortedBanks.forEach(bank => {
                        if (bank.isTransfer === 1) { // Chỉ hiển thị ngân hàng hỗ trợ chuyển khoản
                            const option = document.createElement('option');
                            option.value = bank.bin; // Sử dụng bin làm giá trị
                            option.textContent = bank.shortName || bank.short_name || bank.name;
                            option.setAttribute('data-code', bank.code); // Lưu mã code nếu cần
                            bankSelect.appendChild(option);
                        }
                    });
                }
            } catch (error) {
                console.error('Lỗi khi tải danh sách ngân hàng:', error);
                const fallbackBanks = [
                    {bin: '970422', shortName: 'MB Bank', code: 'MB'},
                    {bin: '970436', shortName: 'Vietcombank', code: 'VCB'},
                    {bin: '970407', shortName: 'Techcombank', code: 'TCB'},
                    {bin: '970441', shortName: 'VIB', code: 'VIB'},
                    {bin: '970416', shortName: 'ACB', code: 'ACB'}
                ];
                
                const bankSelect = document.getElementById('bank_id');
                fallbackBanks.forEach(bank => {
                    const option = document.createElement('option');
                    option.value = bank.bin;
                    option.textContent = bank.shortName;
                    option.setAttribute('data-code', bank.code);
                    bankSelect.appendChild(option);
                });
            }
        }

        document.addEventListener('DOMContentLoaded', loadBanks);

        function formatCurrency(input) {
            let value = input.value.replace(/[^\d]/g, '');
            if (value.length > 0) {
                let num = parseInt(value, 10);
                value = num.toLocaleString('vi-VN');
            }
            input.value = value;
            input.setAttribute('data-raw', value.replace(/[^\d]/g, ''));
        }

        function switchTab(tabId, button) {
            // Ẩn tất cả các tab content
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
                tab.classList.add('hidden');
            });
            
            // Hiển thị tab được chọn
            document.getElementById(tabId).classList.remove('hidden');
            document.getElementById(tabId).classList.add('active');
            
            // Cập nhật trạng thái active của các nút tab
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active-tab');
                btn.classList.add('bg-gray-100');
            });
            
            button.classList.remove('bg-gray-100');
            button.classList.add('active-tab');
        }
        
        function generateQR() {
            let qrUrl = '';
            
            if (document.getElementById('bankQR').classList.contains('active')) {
                // Tạo QR chuyển khoản ngân hàng
                const bankId = document.getElementById('bank_id').value;
                const accountNo = document.getElementById('account_no').value.trim();
                const template = document.getElementById('template').value;
                const amount = document.getElementById('amount').value.trim();
                const description = encodeURIComponent(document.getElementById('description').value.trim());
                const accountName = encodeURIComponent(document.getElementById('account_name').value.trim());
                
                if (!bankId) {
                    alert('Vui lòng chọn ngân hàng');
                    return;
                }
                if (!accountNo) {
                    alert('Vui lòng nhập số tài khoản');
                    return;
                }
                
                qrUrl = `https://img.vietqr.io/image/${bankId}-${accountNo}-${template}.png?amount=${amount}&addInfo=${description}&accountName=${accountName}`;
            } 
            else if (!document.getElementById('textQR').classList.contains('hidden')) {
                // Tạo QR từ văn bản
                qrUrl = `https://api.qrserver.com/v1/create-qr-code/?size=1000x1000&data=${encodeURIComponent(document.getElementById('message').value.trim())}`;
            } 
            else {
                // Tạo QR WiFi
                let ssid = document.getElementById('ssid').value.trim();
                let password = document.getElementById('password').value.trim();
                let encryption = document.getElementById('encryption').value;
                qrUrl = `https://api.qrserver.com/v1/create-qr-code/?size=1000x1000&data=${encodeURIComponent(`WIFI:T:${encryption};S:${ssid};P:${password};;`)}`;
            }
            
            document.getElementById('qrcodeImg').src = qrUrl;
        }
        
        function downloadQR() {
            const qrcodeImg = document.querySelector('#qrcodeImg');
            const defaultImgSrc = 'https://i.imgur.com/U7afLiO.png';
            
            if (!qrcodeImg || !qrcodeImg.src || qrcodeImg.src === defaultImgSrc) {
                alert('Không tìm thấy ảnh QR Code. Vui lòng tạo ảnh trước!');
                return;
            }
            
            fetch(qrcodeImg.src)
                .then(response => response.blob())
                .then(blob => {
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'qrcode.png';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    URL.revokeObjectURL(url);
                })
                .catch(error => {
                    console.error('Lỗi tải ảnh:', error);
                    alert('Có lỗi xảy ra khi tải ảnh QR Code');
                });
        }
    </script>
</body>
</html>