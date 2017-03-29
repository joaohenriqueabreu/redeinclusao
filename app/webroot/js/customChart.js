(function(){
// variável para o timeout
var t;
// função de redimensionamento
// com argumento para animar ou não o gráfico
function size(animate){
// Não queremos que haja uma animação no gráfico caso o mesmo tenha sido
// redimensionado
 // Otimiza o carregamento da função que apenas executa o redimensionamento após redimensionar a janela
 clearTimeout(t);
 // Essa linha vai resetar o timeout.
 t = setTimeout(function(){
 $("canvas").each(function(i,el){
 // Configurar a altura e largura do elemento canvas igual a do elemento pai.
 // O elemento pai é a div.canvas-container
 $(el).attr({
 "width":$(el).parent().width(),
 "height":$(el).parent().outerHeight()
 });
 });
 redraw(animate);

// criamos um loop através dos widgets e configuramos a altura de acordo
 var m = 0;
 // temos de remover qualquer configuração de altura inline.
 $(".widget").height("");
 $(".widget").each(function(i,el){ m = Math.max(m,$(el).height()); });
 $(".widget").height(m);

}, 100); // o timeout está configurado para 100 milisegundos
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
 // a resto da criação do gráfico ocorre nesta partehere
 // ....
}
});
size();