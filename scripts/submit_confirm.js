const kirimButton = document.getElementById("kirim-button");

kirimButton.addEventListener("click", function (event) {
  const konfirmasi = confirm("Apakah Anda yakin ingin mengirim pengaduan?");
  if (!konfirmasi) {
    event.preventDefault();
  }
});