function resiko() {
    var levelKemungkinan = document.getElementById("level_kemungkinan").value;
    var levelDampak = document.getElementById("level_dampak").value;
    var levelResiko = parseInt(levelKemungkinan) * parseInt(levelDampak);
    var lr = (document.getElementById("level_resiko").value = levelResiko);

    if (lr <= 2) {
        document.getElementById("tingkat_level_resiko").value = "Sangat Rendah";
    } else if (lr > 2 && lr <= 4) {
        document.getElementById("tingkat_level_resiko").value = "Rendah";
    } else if (lr > 4 && lr <= 10) {
        document.getElementById("tingkat_level_resiko").value = "Sedang";
    } else if (lr > 10 && lr <= 19) {
        document.getElementById("tingkat_level_resiko").value = "Tinggi";
    } else if (lr > 19) {
        document.getElementById("tingkat_level_resiko").value = "Sangat Tinggi";
    }

    if (levelKemungkinan == 5 && levelDampak == 1) {
        document.getElementById("prioritas_resiko").value = 17;
    } else if (levelKemungkinan == 5 && levelDampak == 2) {
        document.getElementById("prioritas_resiko").value = 10;
    } else if (levelKemungkinan == 5 && levelDampak == 3) {
        document.getElementById("prioritas_resiko").value = 6;
    } else if (levelKemungkinan == 5 && levelDampak == 4) {
        document.getElementById("prioritas_resiko").value = 3;
    } else if (levelKemungkinan == 5 && levelDampak == 5) {
        document.getElementById("prioritas_resiko").value = 1;
    } else if (levelKemungkinan == 4 && levelDampak == 1) {
        document.getElementById("prioritas_resiko").value = 20;
    } else if (levelKemungkinan == 4 && levelDampak == 2) {
        document.getElementById("prioritas_resiko").value = 13;
    } else if (levelKemungkinan == 4 && levelDampak == 3) {
        document.getElementById("prioritas_resiko").value = 8;
    } else if (levelKemungkinan == 4 && levelDampak == 4) {
        document.getElementById("prioritas_resiko").value = 4;
    } else if (levelKemungkinan == 4 && levelDampak == 5) {
        document.getElementById("prioritas_resiko").value = 2;
    } else if (levelKemungkinan == 3 && levelDampak == 1) {
        document.getElementById("prioritas_resiko").value = 22;
    } else if (levelKemungkinan == 3 && levelDampak == 2) {
        document.getElementById("prioritas_resiko").value = 15;
    } else if (levelKemungkinan == 3 && levelDampak == 3) {
        document.getElementById("prioritas_resiko").value = 11;
    } else if (levelKemungkinan == 3 && levelDampak == 4) {
        document.getElementById("prioritas_resiko").value = 7;
    } else if (levelKemungkinan == 3 && levelDampak == 5) {
        document.getElementById("prioritas_resiko").value = 5;
    } else if (levelKemungkinan == 2 && levelDampak == 1) {
        document.getElementById("prioritas_resiko").value = 24;
    } else if (levelKemungkinan == 2 && levelDampak == 2) {
        document.getElementById("prioritas_resiko").value = 19;
    } else if (levelKemungkinan == 2 && levelDampak == 3) {
        document.getElementById("prioritas_resiko").value = 14;
    } else if (levelKemungkinan == 2 && levelDampak == 4) {
        document.getElementById("prioritas_resiko").value = 12;
    } else if (levelKemungkinan == 2 && levelDampak == 5) {
        document.getElementById("prioritas_resiko").value = 9;
    } else if (levelKemungkinan == 1 && levelDampak == 1) {
        document.getElementById("prioritas_resiko").value = 25;
    } else if (levelKemungkinan == 1 && levelDampak == 2) {
        document.getElementById("prioritas_resiko").value = 23;
    } else if (levelKemungkinan == 1 && levelDampak == 3) {
        document.getElementById("prioritas_resiko").value = 21;
    } else if (levelKemungkinan == 1 && levelDampak == 4) {
        document.getElementById("prioritas_resiko").value = 18;
    } else if (levelKemungkinan == 1 && levelDampak == 5) {
        document.getElementById("prioritas_resiko").value = 16;
    }

    var kr = document.getElementById("kategori_resiko").value;
    var noReg = document.getElementById("no_reg_resiko");
    if (kr == "Resiko Penerimaan") {
        noReg.value = "A";
    } else if (kr == "Resiko Belanja") {
        noReg.value = "B";
    } else if (kr == "Resiko Pembiayaan") {
        noReg.value = "C";
    } else if (kr == "Resiko Strategis") {
        noReg.value = "D";
    } else if (kr == "Resiko Fraud") {
        noReg.value = "E";
    } else if (kr == "Resiko Kepatuhan") {
        noReg.value = "F";
    } else if (kr == "Resiko Operasional") {
        noReg.value = "G";
    } else if (kr == "Resiko Reputasi") {
        noReg.value = "H";
    } else if (kr == "Resiko Lainnya") {
        noReg.value = "I";
    }
}

function risk() {
    var lka = document.getElementById("level_kemungkinan_actual").value;
    var lda = document.getElementById("level_dampak_actual").value;
    var lra = parseInt(lka) * parseInt(lda);
    document.getElementById("level_resiko_actual").value = lra;

    if (lra <= 2) {
        document.getElementById("tingkat_level_resiko_actual").value =
            "Sangat Rendah";
    } else if (lra > 2 && lra <= 4) {
        document.getElementById("tingkat_level_resiko_actual").value = "Rendah";
    } else if (lra > 4 && lra <= 10) {
        document.getElementById("tingkat_level_resiko_actual").value = "Sedang";
    } else if (lra > 10 && lra <= 19) {
        document.getElementById("tingkat_level_resiko_actual").value = "Tinggi";
    } else if (lra > 19) {
        document.getElementById("tingkat_level_resiko_actual").value =
            "Sangat Tinggi";
    }

    var lrh = document.getElementById("level_resiko_harapan").value;
    var deviasiResiko = lra - lrh;
    var dr = document.getElementById("deviasi_resiko").value = deviasiResiko;
    
    if (dr < 0) {
        document.getElementById("trend_resiko").value = "Turun";
    } else if (dr == 0) {
        document.getElementById("trend_resiko").value = "Tetap";
    } else if (dr > 0) {
        document.getElementById("trend_resiko").value = "Naik";
    }

}

// Event Pada Saat Link di Klik

$('.page-scroll').on('click', function(e) {

    // Ambil isi href
    var tujuan = $(this).attr('href');

    // Tangkap elemen ybs
    var elemenTujuan = $(tujuan);

    // console.log($('html').scrollTop());

    // Pindahkan scroll
    $('html').animate({
        scrollTop: elemenTujuan.offset().top - 90
    }, 1000);

    e.preventDefault();

});

/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
