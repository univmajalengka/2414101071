function hitung(){
  let harga = 0;
  if(penginapan.checked) harga+=1000000;
  if(transportasi.checked) harga+=1200000;
  if(service.checked) harga+=500000;

  let hari = document.getElementById('hari').value;
  let peserta = document.getElementById('peserta').value;

  document.getElementById('harga').value = harga;
  document.getElementById('total').value = harga * hari * peserta;
  return true;
}