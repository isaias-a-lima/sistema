var btn_fmp_ed = document.getElementById('btn_fmp_ed');
btn_fmp_ed.addEventListener("click",function(){
    var idi = document.getElementById('idIntegrante').value;
    var url = "../view/?p=fmped&idi=" + idi;
    url += "&t=fmp";
    window.location.href = url;
});