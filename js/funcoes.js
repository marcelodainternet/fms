// JavaScript Document
function carrega_campos(arquivo){
var variaveis = $("#form1").serialize();
var url = 'ajax.'+arquivo+'.php?'+variaveis;
$.get(url, function(dataReturn) {
$('#form1').html(dataReturn);
});
}
function permissao_total(id_pperfis,id_aacoes,permissao){
var url = 'ajax.permissao-total.php?id_pperfis='+id_pperfis+'&id_aacoes='+id_aacoes+'&permissao='+permissao;
$.get(url, function(dataReturn) {
$('#total'+id_pperfis).html(dataReturn);
});
}
function permissao_tabela(id_pperfis,id_ttabelas,id_aacoes,permissao){
var url = 'ajax.permissao-tabela.php?id_pperfis='+id_pperfis+'&id_ttabelas='+id_ttabelas+'&id_aacoes='+id_aacoes+'&permissao='+permissao;
$.get(url, function(dataReturn) {
$('#p'+id_pperfis+'tabela'+id_ttabelas).html(dataReturn);
});
}
function permissao_campo(id_pperfis,id_ppermissoes,nome_aacoes,permissao){
var url = 'ajax.permissao-campo.php?id_ppermissoes='+id_ppermissoes+'&nome_aacoes='+nome_aacoes+'&permissao='+permissao;
$.get(url, function(dataReturn) {
$('#p'+id_pperfis+'span'+id_ppermissoes).html(dataReturn);
});
}
function carrega_edicao_expressa(tabela, campo, componente, id, exibir=''){
var url = 'ajax.edicao-expressa.php?tabela='+tabela+'&campo='+campo+'&componente='+componente+'&id='+id+'&exibir='+exibir;
$.get(url, function(dataReturn) {
$('#'+campo+'_'+id).html(dataReturn);
});
}
function carrega_edicao_expressa_relacionamento(tabela, campo, componente, id, nome, primeiro_campo){
var url = 'ajax.edicao-expressa-relacionamento.php?tabela='+tabela+'&campo='+campo+'&componente='+componente+'&id='+id+'&nome='+nome+'&primeiro_campo='+primeiro_campo;
$.get(url, function(dataReturn) {
$('#'+campo+'_'+id).html(dataReturn);
});
}
function carrega_edicao_expressa_label(tabela, campo, componente, id, nome, primeiro_campo){
var url = 'ajax.edicao-expressa-label.php?tabela='+tabela+'&campo='+campo+'&componente='+componente+'&id='+id+'&nome='+nome+'&primeiro_campo='+primeiro_campo;
$.get(url, function(dataReturn) {
$('#'+campo+'_'+id).html(dataReturn);
});
}
function salva_edicao_expressa(tabela, campo, componente, id, valor, exibir=''){
var url = 'ajax.edicao-expressa.php?tabela='+tabela+'&campo='+campo+'&componente='+componente+'&id='+id+'&valor='+valor+'&exibir='+exibir+'&salvar=true';
$.get(url, function(dataReturn) {
$('#'+campo+'_'+id).html(dataReturn);
});
}
function salva_edicao_expressa_relacionamento(tabela, campo, componente, id, valor, nome, primeiro_campo){
var url = 'ajax.edicao-expressa-relacionamento.php?tabela='+tabela+'&campo='+campo+'&componente='+componente+'&id='+id+'&valor='+valor+'&nome='+nome+'&primeiro_campo='+primeiro_campo+'&salvar=true';
$.get(url, function(dataReturn) {
$('#'+campo+'_'+id).html(dataReturn);
});
}
function salva_edicao_expressa_label(tabela, campo, componente, id, valor, nome, primeiro_campo){
var url = 'ajax.edicao-expressa-label.php?tabela='+tabela+'&campo='+campo+'&componente='+componente+'&id='+id+'&valor='+valor+'&nome='+nome+'&primeiro_campo='+primeiro_campo+'&salvar=true';
$.get(url, function(dataReturn) {
$('#'+campo+'_'+id).html(dataReturn);
});
}
function InvalidMsg(textbox,msg) {
if(textbox.validity.patternMismatch){
textbox.setCustomValidity(msg);
}    
else {
textbox.setCustomValidity('');
}
return true;
}
function filtro_propriedade(tabela, item){
var url = 'ajax.filtro-propriedade.php?tabela='+tabela+'&item='+item;
$.get(url, function(dataReturn) {
$('#propriedades'+item).html(dataReturn);
});
}
function MM_changeProp(objId,x,theProp,theValue) { //v9.0
var obj = null; with (document){ if (getElementById)
obj = getElementById(objId); }
if (obj){
if (theValue == true || theValue == false)
eval("obj.style."+theProp+"="+theValue);
else eval("obj.style."+theProp+"='"+theValue+"'");
}
}
function filtro(objeto, propriedade){
var url = 'ajax.filtro.php?objeto='+objeto+'&propriedade='+propriedade;
$.get(url, function(dataReturn) {
$('#id_'+objeto).html(dataReturn);
$('#ids_'+objeto).html(dataReturn);
});
}
function MascaraData(data){
if(mascaraInteiro(data)==false){
event.returnValue = false;
}	
return formataCampo(data, '00/00/0000', event);
}
function ValidaCep(cep){
exp = /\d{2}\.\d{3}\-\d{3}/
if(!exp.test(cep.value))
alert('Numero de Cep Invalido!');		
}
function ValidaData(data){
exp = /\d{2}\/\d{2}\/\d{4}/
if(!exp.test(data.value))
alert('Data Invalida!');			
}
function ValidarCPF(cpf){
cpf = cpf.value;
var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
if(!filtro.test(cpf)){
window.alert("CPF Invalido!");
return false;
}
cpf = remove(cpf, ".");
cpf = remove(cpf, "-");
if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
cpf == "88888888888" || cpf == "99999999999"){
window.alert("CPF Invalido!");
return false;
}
soma = 0;
for(i = 0; i < 9; i++)
soma += parseInt(cpf.charAt(i)) * (10 - i);
resto = 11 - (soma % 11);
if(resto == 10 || resto == 11)
resto = 0;
if(resto != parseInt(cpf.charAt(9))){
window.alert("CPF Invalido!");
return false;
}
soma = 0;
for(i = 0; i < 10; i ++)
soma += parseInt(cpf.charAt(i)) * (11 - i);
resto = 11 - (soma % 11);
if(resto == 10 || resto == 11)
resto = 0;
if(resto != parseInt(cpf.charAt(10))){
window.alert("CPF Invalido!");
return false;
}
return true;
}
function remove(str, sub) {
i = str.indexOf(sub);
r = "";
if (i == -1) return str;
r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
return r;
}
function mascaraInteiro(){
if (event.keyCode < 48 || event.keyCode > 57){
event.returnValue = false;
return false;
}
return true;
}
function ValidarCNPJ(ObjCnpj){
var cnpj = ObjCnpj.value;
var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
var dig1= new Number;
var dig2= new Number;
exp = /\.|\-|\//g
cnpj = cnpj.toString().replace( exp, "" ); 
var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));
for(i = 0; i<valida.length; i++){
dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);	
dig2 += cnpj.charAt(i)*valida[i];	
}
dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));
if(((dig1*10)+dig2) != digito)	
alert('CNPJ Invalido!');
}
function formataCampo(campo, Mascara, evento) { 
var boleanoMascara; 
var Digitato = evento.keyCode;
exp = /\-|\.|\/|\(|\)| /g
campoSoNumeros = campo.value.toString().replace( exp, "" ); 
var posicaoCampo = 0;	 
var NovoValorCampo="";
var TamanhoMascara = campoSoNumeros.length;; 
if (Digitato != 8) { // backspace 
for(i=0; i<= TamanhoMascara; i++) { 
boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
|| (Mascara.charAt(i) == "/")) 
boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
|| (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
if (boleanoMascara) { 
NovoValorCampo += Mascara.charAt(i); 
TamanhoMascara++;
}else { 
NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
posicaoCampo++; 
}	   	 
}	 
campo.value = NovoValorCampo;
return true; 
}else { 
return true; 
}
}
function mascara(o,f){
v_obj=o
v_fun=f
setTimeout("execmascara()",1)
}
function execmascara(){
v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
v=v.replace(/\D/g,"");
v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
v=v.replace(/(\d)(\d{4})$/,"$1-$2");
return v;
}
function id(el){
return document.getElementById( el );
}
function mascara_moeda(z){ 
v = z.value; 
v=v.replace(/\D/g,"")
v=v.replace(/(\d{1})(\d{20})$/,"$1.$2")
v=v.replace(/(\d{1})(\d{17})$/,"$1.$2")
v=v.replace(/(\d{1})(\d{14})$/,"$1.$2")
v=v.replace(/(\d{1})(\d{11})$/,"$1.$2")
v=v.replace(/(\d{1})(\d{8})$/,"$1.$2")
v=v.replace(/(\d{1})(\d{5})$/,"$1.$2")
v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2")
z.value = v; 
}
function formatar(mascara, documento){
var i = documento.value.length;
var saida = mascara.substring(0,1);
var texto = mascara.substring(i)
if (texto.substring(0,1) != saida){
documento.value += texto.substring(0,1);
}
}