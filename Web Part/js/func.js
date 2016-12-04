$(document).ready(function() {
	$('#center').on('click', '.etapa-img-led', function(){
		filho = $(this).closest('.etapa').find('.etapa-int-i').eq($(this).index());
		filho.focus();
	}).on('contextmenu', '.etapa-img-led', function(){
		filho = $(this).closest('.etapa').find('.etapa-int-i').eq($(this).index());
		filho.val(0);
		filho.change();
		return false;
	}).on('dblclick', '.etapa-img-led', function(){
		filho = $(this).closest('.etapa').find('.etapa-int-i').eq($(this).index());
		filho.val(255);
		filho.change();
	}).on('click', '#nova-etapa', function(){
		//vamos duplicar a ultima div
		index = seq.length-1
		$('.etapa').eq(index).clone().insertBefore('#nova-etapa');
		$('.trans').eq(index).clone().insertBefore('#nova-etapa');

		//copiando os valores pro array
		seq.push([]);
		for( i=0; i<14; i++){
			seq[index+1].push( seq[index][i] );
		}

		$('.etapa').eq(index+1).attr('data-etapa', index+1);
		$('.trans').eq(index+1).attr('data-etapa', index+1);

		$('html,body').animate({
			scrollTop: 336*(index+1) + 160
		}, 1000);

	}).on('change', '.etapa-int-i', function(){
		//vamos pegar o valor
		valor = parseInt( $(this).val() );
		if(valor<0){
			$(this).val(0);
			valor = 0;
		} else if (valor>255){
			$(this).val(255);
			valor = 255;
		}

		etapa = $(this).closest('.etapa');
		etapaindex = parseInt( etapa.attr('data-etapa') );
		campoindex = $(this).closest('.etapa-int').index();

		seq[etapaindex][campoindex] = valor;
		etapa.find('.etapa-img-led-s2').eq( campoindex ).css({ opacity: valor/255.0 });
	}).on('change', '.trans-time', function(){
		//vamos pegar o valor
		valor = parseInt( $(this).val() );
		if(valor<1){
			$(this).val(1);
			valor = 1;
		}

		trans = $(this).closest('.trans');
		etapaindex = parseInt( trans.attr('data-etapa') );

		seq[etapaindex][12] = valor;
	}).on('click', '.trans-opt', function(){

		trans = $(this).closest('.trans');
		etapaindex = parseInt( trans.attr('data-etapa') );

		if( $(this).hasClass('t-right') ){
			trans.removeClass('t-left').addClass('t-right');
			seq[etapaindex][13] = 1;
		} else {
			trans.removeClass('t-right').addClass('t-left');
			seq[etapaindex][13] = 0;
		}
	}).on('click', '.er-bt', function(){

		etapa = $(this).closest('.etapa');
		etapaindex = parseInt( etapa.attr('data-etapa') );

		//removendo as divs
		$('.trans').eq(etapaindex).remove();
		etapa.remove();

		//agora arrumamos o seq
		seq.splice(etapaindex,1);

		console.log(etapaindex);
		//renumerando as etapas e trans
		for(i=etapaindex; i < seq.length; i++ ){
			console.log('update'+String(i));
			$('.etapa').eq(i).attr('data-etapa', i);
			$('.trans').eq(i).attr('data-etapa', i);
		}

	});

	$("#rotina-salvar").click(function(){
		$('#hidden-rotina').attr('value', JSON.stringify(seq));
		setTimeout(function(){
			$('form').submit();
		},50);
	});
});