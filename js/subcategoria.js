 function changeSelect(){

    var select = document.getElementById('dispositivo');
    var selectDescricao = document.getElementById('descricao');

    var value = select.options[select.selectedIndex].value;

    //remove itens
    var length = selectDescricao.options.length;        
    var i;
    for(i = selectDescricao.options.length-1 ; i>=0 ; i--)
    {
        selectDescricao.remove(i);
    }

    //Placa mãe---------------------------------------------------
    if(value == '11') {

        var option1 = document.createElement('option');
        option1.value = '1';
        option1.text = 'Selecione opção';

        selectDescricao.add(option1);
       //Gravadores------------------------------------------------
    } else if(value == 'Placa mae') {

        var option = document.createElement('option');
        option.value = 'H81M-C/BR - Asus';
        option.text = 'H81M-C/BR - Asus';

       // var option2 = document.createElement('option');
       // option2.value = '2';
        //option2.text = 'SETOR 2 (CONTROLADORIA)';

        selectDescricao.add(option);
       // selectSetor.add(option2);
       //Gravadores------------------------------------------------
    } else if (value == 'Gravadores'){

        var option2 = document.createElement('option');
        option2.value = 'DVDRW FL-421 - Faster';
        option2.text = 'DVDRW FL-421 - Faster';

      //  var option4 = document.createElement('option');
      //  option4.value = '4';
     //   option4.text = 'SETOR 4 (NEGÓCIOS)';

      //  selectSetor.add(option3);
        selectDescricao.add(option2);
        //Processadores--------------------------------------------
        }  else if (value == 'Processadores'){

        var option3 = document.createElement('option');
        option3.value = 'I3 4170 - 3.70GHZ - Intel';
        option3.text = 'I3 4170 - 3.70GHZ - Intel';

        var option4 = document.createElement('option');
        option4.value = 'I3 3250 - 3.50GHZ - Intel';
        option4.text = 'I3 3250 - 3.50GHZ - Intel';

        selectDescricao.add(option3);
        selectDescricao.add(option4);
        //Fontes---------------------------------------------------
        }   else if (value == 'Fontes'){

        var option5 = document.createElement('option');
        option5.value = 'VX series - 350w - Aero Cool';
        option5.text = 'VX series - 350w - Aero Cool';

        var option6 = document.createElement('option');
        option6.value = 'ATX - 250w - Coletek';
        option6.text = 'ATX - 250w - Coletek';

        var option7 = document.createElement('option');
        option7.value = 'ATX - 200w - multilaser';
        option7.text = 'ATX - 200w - multilaser';

        var option8 = document.createElement('option');
        option8.value = 'ATX - 500w - Bluecase';
        option8.text = 'ATX - 500w - Bluecase';

        selectDescricao.add(option5);
        selectDescricao.add(option6);
        selectDescricao.add(option7);
        selectDescricao.add(option8);
        //Estabilizador-------------------------------------------
        }   else if (value == 'Estabilizador'){

        var option9 = document.createElement('option');
        option9.value = 'BMI - 300w';
        option9.text = 'BMI - 300w';

        var option10 = document.createElement('option');
        option10.value = 'BMI - 500w';
        option10.text = 'BMI - 500w';

        selectDescricao.add(option9);
        selectDescricao.add(option10);
        //HD's / SSD's -------------------------------------------
        } else if (value == 'HDs / SSDs'){

        var option11 = document.createElement('option');
        option11.value = 'HD 1Tb Samsung/Seagate';
        option11.text = 'HD 1Tb Samsung/Seagate';

        var option12 = document.createElement('option');
        option12.value = 'HD 500GB Seagate';
        option12.text = 'HD 500GB Seagate';

        var option13 = document.createElement('option');
        option13.value = 'SSD 120Gb WD green/SanDisk';
        option13.text = 'SSD 120Gb WD green/SanDisk';

        selectDescricao.add(option11);
        selectDescricao.add(option12);
        selectDescricao.add(option13);
        //Memoria -------------------------------------------
        } else if (value == 'Memorias'){

        var option14 = document.createElement('option');
        option14.value = 'Memoria 4Gb Pc3';
        option14.text = 'Memoria 4Gb Pc3';

        
        selectDescricao.add(option14);
        //Gabinetes -------------------------------------------
        } else if (value == 'Gabinetes'){

        var option15 = document.createElement('option');
        option15.value = 'Gabinetes Wise 4 baias';
        option15.text = 'Gabinetes Wise 4 baias';

        var option16 = document.createElement('option');
        option16.value = 'Carrinho de gabinete';
        option16.text = 'Carrinho de gabinete';

        
        selectDescricao.add(option15);
        selectDescricao.add(option16);

        } else if (value == 'Mouses/Teclados'){

        var option22 = document.createElement('option');
        option22.value = 'Mouse Optical fortrek';
        option22.text = 'Mouse Optical fortrek';
        
        var option17 = document.createElement('option');
        option17.value = 'Mouse M90 logitech';
        option17.text = 'Mouse M90 logitech';

        var option18 = document.createElement('option');
        option18.value = 'Teclado Lenovo';
        option18.text = 'Teclado Lenovo';

        var option19 = document.createElement('option');
        option19.value = 'Teclado Dell Slim c/fio';
        option19.text = 'Teclado Dell Slim c/fio ';

        var option20 = document.createElement('option');
        option20.value = 'Teclado multimedia fortrek slim';
        option20.text = 'Teclado multimedia fortrek slim';

        

        selectDescricao.add(option22);
        selectDescricao.add(option17);
        selectDescricao.add(option18);
        selectDescricao.add(option19);
        selectDescricao.add(option20);
        

        } else if (value == 'Switchs/Hubs'){

        var option21 = document.createElement('option');
        option21.value = 'Switch Gigabit 8portas tp-link';
        option21.text = 'Switch Gigabit 8portas tp-link';

        
        selectDescricao.add(option21);

        }
    }
