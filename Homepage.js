
window.onscroll = function() {
	scroll()
};

function scroll() {
  if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
    document.getElementById("Btn").style.display = "block";

  } else {
    document.getElementById("Btn").style.display = "none";
  }
}


function gotop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}