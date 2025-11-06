// Analog Clock with Modern Design
function drawClock() {
    const canvas = document.getElementById('analogClock');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    const centerX = canvas.width / 2;
    const centerY = canvas.height / 2;
    const radius = Math.min(centerX, centerY) - 25;

    // Clear canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Draw outer shadow circle
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius + 5, 0, 2 * Math.PI);
    ctx.fillStyle = 'rgba(0, 0, 0, 0.1)';
    ctx.fill();

    // Draw outer circle with gradient effect
    const gradient = ctx.createRadialGradient(centerX - 20, centerY - 20, 0, centerX, centerY, radius);
    gradient.addColorStop(0, '#f8f9fa');
    gradient.addColorStop(1, '#e9ecef');
    
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
    ctx.fillStyle = gradient;
    ctx.fill();

    // Draw main clock circle border
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
    ctx.strokeStyle = '#333';
    ctx.lineWidth = 5;
    ctx.stroke();

    // Draw inner circle for depth
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius - 10, 0, 2 * Math.PI);
    ctx.strokeStyle = '#dee2e6';
    ctx.lineWidth = 1;
    ctx.stroke();

    // Draw center circle with gradient
    const centerGradient = ctx.createRadialGradient(centerX, centerY, 0, centerX, centerY, 12);
    centerGradient.addColorStop(0, '#ff6b35');
    centerGradient.addColorStop(1, '#f7931e');
    
    ctx.beginPath();
    ctx.arc(centerX, centerY, 12, 0, 2 * Math.PI);
    ctx.fillStyle = centerGradient;
    ctx.fill();
    
    ctx.beginPath();
    ctx.arc(centerX, centerY, 12, 0, 2 * Math.PI);
    ctx.strokeStyle = '#333';
    ctx.lineWidth = 2;
    ctx.stroke();

    // Draw hour markers (12 main markers)
    for (let i = 1; i <= 12; i++) {
        const angle = (i * 30 - 90) * (Math.PI / 180);
        
        // Draw tick marks
        const x1 = centerX + (radius - 25) * Math.cos(angle);
        const y1 = centerY + (radius - 25) * Math.sin(angle);
        const x2 = centerX + (radius - 8) * Math.cos(angle);
        const y2 = centerY + (radius - 8) * Math.sin(angle);

        ctx.beginPath();
        ctx.moveTo(x1, y1);
        ctx.lineTo(x2, y2);
        ctx.strokeStyle = '#333';
        ctx.lineWidth = 3;
        ctx.lineCap = 'round';
        ctx.stroke();

        // Draw numbers
        const textX = centerX + (radius - 45) * Math.cos(angle);
        const textY = centerY + (radius - 45) * Math.sin(angle);
        ctx.font = 'bold 20px Arial';
        ctx.fillStyle = '#333';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(i, textX, textY);
    }

    // Draw minute markers (60 small markers)
    for (let i = 0; i < 60; i++) {
        if (i % 5 !== 0) { // Skip main hour markers
            const angle = (i * 6 - 90) * (Math.PI / 180);
            const x1 = centerX + (radius - 15) * Math.cos(angle);
            const y1 = centerY + (radius - 15) * Math.sin(angle);
            const x2 = centerX + (radius - 8) * Math.cos(angle);
            const y2 = centerY + (radius - 8) * Math.sin(angle);

            ctx.beginPath();
            ctx.moveTo(x1, y1);
            ctx.lineTo(x2, y2);
            ctx.strokeStyle = '#666';
            ctx.lineWidth = 1;
            ctx.lineCap = 'round';
            ctx.stroke();
        }
    }

    // Get current time
    const now = new Date();
    const hours = now.getHours() % 12;
    const minutes = now.getMinutes();
    const seconds = now.getSeconds();

    // Draw hour hand with shadow
    const hourAngle = (hours * 30 + minutes * 0.5 - 90) * (Math.PI / 180);
    ctx.save();
    ctx.shadowColor = 'rgba(0, 0, 0, 0.3)';
    ctx.shadowBlur = 5;
    ctx.shadowOffsetX = 2;
    ctx.shadowOffsetY = 2;
    ctx.beginPath();
    ctx.moveTo(centerX, centerY);
    ctx.lineTo(
        centerX + radius * 0.5 * Math.cos(hourAngle),
        centerY + radius * 0.5 * Math.sin(hourAngle)
    );
    ctx.strokeStyle = '#333';
    ctx.lineWidth = 6;
    ctx.lineCap = 'round';
    ctx.stroke();
    ctx.restore();

    // Draw minute hand with shadow
    const minuteAngle = (minutes * 6 + seconds * 0.1 - 90) * (Math.PI / 180);
    ctx.save();
    ctx.shadowColor = 'rgba(0, 0, 0, 0.3)';
    ctx.shadowBlur = 5;
    ctx.shadowOffsetX = 2;
    ctx.shadowOffsetY = 2;
    ctx.beginPath();
    ctx.moveTo(centerX, centerY);
    ctx.lineTo(
        centerX + radius * 0.7 * Math.cos(minuteAngle),
        centerY + radius * 0.7 * Math.sin(minuteAngle)
    );
    ctx.strokeStyle = '#333';
    ctx.lineWidth = 4;
    ctx.lineCap = 'round';
    ctx.stroke();
    ctx.restore();

    // Draw second hand with orange color and shadow
    const secondAngle = (seconds * 6 - 90) * (Math.PI / 180);
    ctx.save();
    ctx.shadowColor = 'rgba(255, 107, 53, 0.5)';
    ctx.shadowBlur = 3;
    ctx.shadowOffsetX = 1;
    ctx.shadowOffsetY = 1;
    ctx.beginPath();
    ctx.moveTo(centerX, centerY);
    ctx.lineTo(
        centerX + radius * 0.85 * Math.cos(secondAngle),
        centerY + radius * 0.85 * Math.sin(secondAngle)
    );
    ctx.strokeStyle = '#ff6b35';
    ctx.lineWidth = 2;
    ctx.lineCap = 'round';
    ctx.stroke();
    ctx.restore();
}

// Update date display
function updateDate() {
    const now = new Date();
    const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    
    const dayName = days[now.getDay()];
    const day = now.getDate();
    const month = months[now.getMonth()];
    const year = now.getFullYear();

    const dateDisplay = document.getElementById('dateDisplay');
    if (dateDisplay) {
        dateDisplay.textContent = `${dayName} ${day} ${month} ${year}`;
    }
}

// Initialize clock and date
function initClock() {
    drawClock();
    updateDate();
    
    // Update every second
    setInterval(() => {
        drawClock();
    }, 1000);
}

// Auto-submit on QR code scan (if barcode scanner is used)
document.addEventListener('DOMContentLoaded', function() {
    initClock();
    
    const nomorTiketInput = document.getElementById('nomor_tiket');
    const absenForm = document.getElementById('absenForm');
    
    if (nomorTiketInput && absenForm) {
        // Auto-submit when Enter is pressed
        nomorTiketInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                absenForm.submit();
            }
        });

        // Focus on input when page loads
        nomorTiketInput.focus();
    }

    // Clear success message after 5 seconds
    const successAlert = document.querySelector('.alert-box.success');
    if (successAlert) {
        setTimeout(() => {
            successAlert.style.transition = 'opacity 0.5s';
            successAlert.style.opacity = '0';
            setTimeout(() => {
                successAlert.remove();
            }, 500);
        }, 5000);
    }
});
