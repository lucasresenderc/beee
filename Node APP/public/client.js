(function() {

    var socket = io.connect(window.location.hostname + ':' + 3000);
    var rotina;
    var rodando = 1;

    socket.on('connect', function(data) {
    	//avisa que conseguiu conectar
        socket.emit('join');
    });

    function montarsite(){
        //montar as divs
        html = $('#etapa-clone').html();

        transtime = $('#trans-time').html();
        transclick = $('#trans-click').html();

        for(i=0; i<rotina['size']; i++){
            //clonar a etapa
            $('#etapa-final').before('<div class="etapa off etapa-normal" data-etapa="'+i+'">'+html+'</div>');

            if( rotina['rotina'][i][13] == 1 ){
                //é de clique
                $('#etapa-final').before('<div class="trans t-left t-center off trans-normal" data-etapa="'+i+'">'+transclick+'</div>');
            } else {
                //é de tempo
                $('#etapa-final').before('<div class="trans t-left t-center off trans-normal" data-etapa="'+i+'">'+transtime+'</div>');
            }
        }

        //agora vamos pegar cada etapa e arrumar ela
        for(i=0; i<rotina['size']; i++){
            //pegando etapa e trans
            etapa = $('.etapa-normal').eq(i);
            trans = $('.trans-normal').eq(i);

            if( rotina['rotina'][i][13] == 0 ){
                trans.find('.time-text').text(rotina['rotina'][i][12]+' ms')
            }

            for(j=0; j<12; j++){
                etapa.find('.etapa-img-led-s2').eq(j).css('opacity', parseFloat(rotina['rotina'][i][j])/255 );
                etapa.find('.etapa-int-i').eq(j).val( rotina['rotina'][i][j] );
            }
        }

        $('#trans-time').remove();
        $('#trans-click').remove();
        $('#etapa-clone').remove();

        $('#play-cnt').removeClass('off');
        $('#rc-nome').text(rotina['nome']);

        //página montada que é uma beleza
    };

    socket.on('data', function(data){
    	rotina = data;
        rotina['rotina'] = JSON.parse(rotina['rotina']);
        rotina['size'] = rotina['rotina'].length;

        //agora vamos montar o site com tudo isso
        montarsite();
    });

    //ao clicar num tr-bt a gente vai avançar pro proximo slide

    function contarTempo(chamada,timeout){
        $('.using .time-count').css('width', chamada+'px');
        if(chamada<199){
            setTimeout( function(){
                contarTempo(chamada+1, timeout);
            }, timeout );
        }
    };

    function nextconfig(){
            if(rodando){
            //mandar mostrar a etapa
            if(rotina['size']>0){
                socket.emit('novaetapa', rotina['rotina'][0] );
            } else {
                socket.emit('defaultstate');
                $('#rc-restart').removeClass('off');
                $('#rc-parar').addClass('off');
            }

            //deletar o primeiro objeto de etapa que tiver
            $('.etapa').eq(0).remove();
            $('.trans').eq(0).remove();

            if(rotina['size']>0){
                //setar as novas
                $('.etapa').eq(0).removeClass('off');
                $('.trans').eq(0).removeClass('off').find('.tr-run').addClass('using');

                //definir o timeout
                timeout = (rotina['rotina'][0][13] == 1) ? 0 : rotina['rotina'][0][12];

                //agora vamos limpar a rotina
                rotina['rotina'].splice(0,1);
                rotina['size']--;

                //agora vamos chamar a própria função se for de tempo
                if( timeout != 0 ){
                    setTimeout( nextconfig, timeout );
                    contarTempo( 0 , timeout/200 );           
                }
            }
        }
    };

    document.onclick = function(event) {
        var el = event.target;
        if (el.className == "tr-run tr-bt using") {
            nextconfig();
            $('#rc-parar').removeClass('off');
        } else if (el.id == 'rc-parar' && el.className == 'rotina-bt'){
            //vamos parar
            rodando = 0;
            $('.etapa-normal').remove();
            $('.trans').remove();

            //mandando o arduino parar também
            socket.emit('defaultstate');

            //arrumando o restart
            $('#rc-restart').removeClass('off');
            $('#rc-parar').addClass('off');
        } else if (el.id == 'rc-restart' && el.className == 'rotina-bt'){
            //reiniciar a página
            location.reload();
        }
    };
    
}());