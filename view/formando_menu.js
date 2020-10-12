var btn_info_conv = document.getElementById('btn_info_conv');
btn_info_conv.addEventListener("click",function(){
    var idi = document.getElementById('idIntegrante').value;
    var url = "../view/?p=fic&idi=" + idi;
    window.location.href = url;
});

var btn_info_edit = document.getElementById('btn_info_edit');
btn_info_edit.addEventListener("click",function(){
    var idi = document.getElementById('idIntegrante').value;
    var url = "../view/?p=ficed&idi=" + idi;
    url += "&t=m";
    window.location.href = url;
});

var btn_fmp = document.getElementById('btn_fmp');
btn_fmp.addEventListener("click",function(){
    var idi = document.getElementById('idIntegrante').value;
    var url = "../view/?p=fmp&idi=" + idi;
    url += "&t=m";
    window.location.href = url;
});

var btn_fmp_ed = document.getElementById('btn_fmp_ed');
btn_fmp_ed.addEventListener("click",function(){
    var idi = document.getElementById('idIntegrante').value;
    var url = "../view/?p=fmped&idi=" + idi;
    url += "&t=m";
    window.location.href = url;
});

var btn_pgt = document.getElementById('btn_pgt');
btn_pgt.addEventListener("click",function(){    
    var url = "../view/?p=fpgt";
    url += "&t=m";
    window.location.href = url;
});