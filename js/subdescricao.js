function changeSelect(){

    var select = document.getElementById('programa');
    var selectDescricao = document.getElementById('descricao');

    var value = select.options[select.selectedIndex].value;

    //remove itens
    var length = selectDescricao.options.length;        
    var i;
    for(i = selectDescricao.options.length-1 ; i>=0 ; i--)
    {
        selectDescricao.remove(i);
    }

    // Vazio ---------------------------------------------------
    if(value == '1') {

      var option1 = document.createElement('option');
      option1.value = '1';
      option1.text = 'Selecione opção';

      selectDescricao.add(option1);
     //Windows------------------------------------------------
    } else if(value == 'Windows') {

      var option = document.createElement('option');
      option.value = '7 Professional with SP1';
      option.text = '7 Professional with SP1';

      var option2 = document.createElement('option');
      option2.value = '10 Professionalvvvv';
      option2.text = '10 Professional';

      selectDescricao.add(option);
      selectDescricao.add(option2);
     //Office------------------------------------------------
    } else if (value == 'Office'){

      var option3 = document.createElement('option');
      option3.value = 'Professinal Plus 2013';
      option3.text = 'Professinal Plus 2013';

      var option4 = document.createElement('option');
      option4.value = '4';
      option4.text = 'Professinal Plus 2016';

      selectDescricao.add(option3);
      selectDescricao.add(option4);
      //Windows Server--------------------------------------------
      } else if (value == 'Windows Server'){

      var option5 = document.createElement('option');
      option5.value = '2012 Standard';
      option5.text = '2012 Standard';

      var option6 = document.createElement('option');
      option6.value = '2012 R2 Standard';
      option6.text = '2012 R2 Standard';

      var option7 = document.createElement('option');
      option7.value = '2016 Standard';
      option7.text = '2016 Standard';

      selectDescricao.add(option5);
      selectDescricao.add(option6);
      selectDescricao.add(option7);
      
      } 
    }