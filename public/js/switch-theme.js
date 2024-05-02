document.addEventListener('DOMContentLoaded', function () {
    const themeSwitch = document.getElementById('theme-switch');
    const themeLink = document.getElementById('theme-link');

    // Mendeteksi perubahan pada tombol switch
    themeSwitch.addEventListener('change', function () {
        if (this.checked) {
            // Jika tombol switch diaktifkan, gunakan dark-theme.css
            themeLink.href = this.dataset.dark;
        } else {
            // Jika tombol switch dinonaktifkan, gunakan light-theme.css
            themeLink.href = this.dataset.light;
        }
    });
});
