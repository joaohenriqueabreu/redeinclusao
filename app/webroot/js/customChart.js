(function(){
// vari�vel para o timeout
var t;
// fun��o de redimensionamento
// com argumento para animar ou n�o o gr�fico
function size(animate){
// N�o queremos que haja uma anima��o no gr�fico caso o mesmo tenha sido
// redimensionado
 // Otimiza o carregamento da fun��o que apenas executa o redimensionamento ap�s redimensionar a janela
 clearTimeout(t);
 // Essa linha vai resetar o timeout.
 t = setTimeout(function(){
 $("canvas").each(function(i,el){
 // Configurar a altura e largura do elemento canvas igual a do elemento pai.
 // O elemento pai � a div.canvas-container
 $(el).attr({
 "width":$(el).parent().width(),
 "height":$(el).parent().outerHeight()
 });
 });
 redraw(animate);

// criamos um loop atrav�s dos widgets e configuramos a altura de acordo
 var m = 0;
 // temos de remover qualquer configura��o de altura inline.
 $(".widget").height("");
 $(".widget").each(function(i,el){ m = Math.max(m,$(el).height()); });
 $(".widget").height(m);

}, 100); // o timeout est� configurado para 100 milisegundos
}
$(window).on('resize', size);
function redraw(animation){
 var options = {};
 if (!animation){
 options.animation = false;
 } else {
 options.animation = true;
 }
 // ....
 // a resto da cria��o do gr�fico ocorre nesta partehere
 // ....
}
});
size();