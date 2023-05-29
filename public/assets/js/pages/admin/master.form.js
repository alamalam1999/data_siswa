    const container = document.getElementById('input-cont1');

    var no = 1;

    function tambahInput(){
        let input = document.createElement('input');
        input.placeholder = 'Menambahkan Wali Sesuka Mu';
        input.id = 'input-cont';
        input.name = 'nama_wali_kelas_'+ no++;
        input.classList = 'form-control form-control-lg form-control-solid mb-3';
        container.appendChild(input);
    }

    function kurangInput(){
        var element = document.getElementById("input-cont1");
        var child=document.getElementById("input-cont");
        element.removeChild(child); 
    }

$(document).ready(function() {

      fetchstudent();
  
      function fetchstudent()
      {
        $.ajax({
          type: "GET",
          url:  hostBaseUrl+"admin/fetch-students",
          dataType: "json",
          success: function (response) {

            $.each(response.masterkelas, function (key, item) {                
               $('#nama_kelas').append(
                    '<option value="'+ item.id +'">'+item.kelas+'</option>'
               ); 
            }); 

            $('#nama_kelas').change(function(){

                var datatest = $(this).val();
                if (datatest != null) {

                    var result = "";

                    $.each(response.masterkelas, function (key, item) {                
                        if (datatest == item.id) {
                            result = item.wali_kelas;
                        }
                     });

                     document.getElementById('nama_wali_kelas').value=result ;               
                     
                }
            })

            $('#unit').change(function() {           

              var dataunit = $(this).val();
              if (dataunit != null) {
                
                var resultunit_sekolah = "";


                if (dataunit == 'SD') {

                  $('#kelas_utama').empty();

                  for(let i = 1; i <= 6; i++) {
                    $('#kelas_utama').append(                
                        '<option value="'+i+'">'+i+'</option>'    
                    ); 
                  }
                } else if (dataunit == 'SMP') {

                  $('#kelas_utama').empty();

                  for(let i = 7; i <= 9; i++) {
                    $('#kelas_utama').append(                
                        '<option value="'+i+'">'+i+'</option>'    
                    ); 
                  }
                } else if (dataunit == 'SMA') {

                  $('#kelas_utama').empty();

                  for(let i = 10; i <= 12; i++) {
                    $('#kelas_utama').append(                
                        '<option value="'+i+'">'+i+'</option>'    
                    ); 
                  }
                }

                  
                  $('#sekolah').change(function() {

                    var datasekolah = $(this).val();

                    $.each(response.masterkelas, function (key, item) {                
                      if (dataunit == item.unit && datasekolah == item.sekolah) {
                        resultunit_sekolah = item.kepala_sekolah;
                      }
                   });

                   document.getElementById('nama_kepala_sekolah').value=resultunit_sekolah ;

                  })
   
              
              }
            })

         

          }
        });
        
      }
  
  });
  
  $(document).ready(function() {
  
    var href3 = $('.linkhref3').attr('href');
  
    $('.linkhref3').attr('href', hostBaseUrl + href3);
  
    var href4 = $('.linkhref4').attr('href');
  
    $('.linkhref4').attr('href', hostBaseUrl + href4);
    
    var href5 = $('.linkhref5').attr('href');
    
    $('.linkhref5').attr('href', hostBaseUrl + href5);
    
    var href6 = $('.linkhref6').attr('href');
    
    $('.linkhref6').attr('href', hostBaseUrl + href6);
    
    var href7 = $('.linkhref7').attr('href');
    
    $('.linkhref7').attr('href', hostBaseUrl + href7);
    
    var href8 = $('.linkhref8').attr('href');
    
    $('.linkhref8').attr('href', hostBaseUrl + href8);
  
    $('.informasi1').hide();
    $('.informasi2').hide();
    $('.informasi3').hide();
    $('.informasi4').hide();
    $('.informasi5').hide();
    
    $('.btnregister1').hide();
    $('.register1').hide();
    $('.btnregister2').hide();
    $('.register2').hide();
    $('.btnregister3').hide();
    $('.register3').hide();
    $('.btnregister4').hide();
    $('.register4').hide();
    $('.btnregister5').hide();
    $('.register5').hide();
    $('.btnregister6').hide();
    $('.register6').hide();
    $('.btnregister7').hide();
    $('.register7').hide();
    $('.btnregister8').hide();
    $('.register8').hide();
    $('.btnregister9').hide();
    $('.register9').hide();
  
  
  
    $('.btndowncheck1').hide();
    $('.formulircheck1').hide();
    $('.formulircheckisi').hide();
    $('.informasites').hide();
    $('.informasiupspp').hide();
    $('.informasiformulir').hide();
    $('.informasiinfo').hide();
  
  $('.btndown1').click( function() {

    $('.btnregister1').toggle();
    $('.btnregister2').toggle();
    $('.btnregister3').toggle();
    $('.btnregister4').toggle();
    $('.btnregister5').toggle();
    $('.btnregister6').toggle();
    $('.btnregister7').toggle();
    $('.btnregister8').toggle();
    $('.btnregister9').toggle();
  
    $('.register1').hide();
    $('.register2').hide();
    $('.register3').hide();
    $('.register4').hide();
    $('.register5').hide();
    $('.register6').hide();
    $('.register7').hide();
    $('.register8').hide();
    $('.register9').hide();
    
  })
  
  $('.btnregister1').click( function() {
    $('.register1').toggle();
  })
  
  $('.btnregister2').click( function() {
    $('.register2').toggle();
  })
  
  $('.btnregister3').click( function() {
    $('.register3').toggle();
  })
  
  $('.btnregister4').click( function() {
    $('.register4').toggle();
  })
  
  $('.btnregister5').click( function() {
    $('.register5').toggle();
  })
  
  $('.btnregister6').click( function() {
    $('.register6').toggle();
  })
  
  $('.btnregister7').click( function() {
    $('.register7').toggle();
  })
  
  $('.btnregister8').click( function() {
    $('.register8').toggle();
  })
  
  $('.btnregister9').click( function() {
    $('.register9').toggle();
  })
  
   
  
  
  $('.btndown2').click( function() {
    $('.informasi2').toggle();
  })
  
  $('.btndown3').click( function() {
    $('.informasi3').toggle();
  })
  
  $('.btndown4').click( function() {
    $('.informasi4').toggle();
  })
  
  $('.btndown5').click( function() {
    $('.informasi5').toggle();
  })
  
  $('.btndowntes').click( function() {
    $('.informasites').toggle();
  })
  
  $('.btndownupspp').click( function() {
    $('.informasiupspp').toggle();
  })
  
  $('.btndownformulir').click( function() {
    $('.informasiformulir').toggle();
  })
  
  $('.btndowninfo').click( function() {
    $('.informasiinfo').toggle();
  })
  
  
  
  
  $('.tab-pane-reregister').hide();
  
      $('.tabpane5').click(function() {
  
          $('.tab-pane-reregister').show();
  
              $('.register1').hide();
              $('.register2').hide();
              $('.register3').hide();
              $('.register4').hide();
              $('.register5').hide();
              $('.register6').hide();
              $('.register7').hide();
              $('.register8').hide();
              $('.register9').hide();
  
              $('.test1').hide();
  
              $('.test2').hide();
  
              $('.test3').hide();
  
              $('.test4').hide();
  
              $('.btnparent').removeClass('btn-secondary').addClass('btn-success');
  
              $('.btnregister1').click( function() {
                $('.register1').toggle();
              })
              
              $('.btnregister2').click( function() {
                $('.register2').toggle();
              })
              
              $('.btnregister3').click( function() {
                $('.register3').toggle();
              })
              
              $('.btnregister4').click( function() {
                $('.register4').toggle();
              })
              
              $('.btnregister5').click( function() {
                $('.register5').toggle();
              })
  
              $('.btnregister6').click( function() {
                $('.register6').toggle();
              })
  
              $('.btnregister7').click( function() {
                $('.register7').toggle();
              })
  
              $('.btnregister8').click( function() {
                $('.register8').toggle();
              })
  
              $('.btnregister9').click( function() {
                $('.register9').toggle();
              })
  
              $('.btntest1').click( function() {
                  $('.test1').toggle();
                  $('.test2').hide();
                  $('.test3').hide();
                  $('.test4').hide();
              })
  
              $('.btntest2').click( function() {
                  $('.test2').toggle();
                  $('.test1').hide();
                  $('.test3').hide();
                  $('.test4').hide();
              })
  
              $('.btntest3').click( function() {
                  $('.test3').toggle();
                  $('.test2').hide();
                  $('.test1').hide();
                  $('.test4').hide();
              })
  
              $('.btntest4').click( function() {
                  $('.test4').toggle();
                  $('.test2').hide();
                  $('.test3').hide();
                  $('.test1').hide();
              })
  
              $('.btnangket').click(function() {
                  $('.test4').toggle();
                  $('.test').hide();
                  $('.test2').hide();
                  $('.test3').hide();
              })
  
              $('.btnceksatu').click( function() {
                  $('.test2').show();
                  $('.test').hide();
                  $('.test3').hide();
                  $('.test4').hide();
                  $('.btnparent').removeClass('btn-success').addClass('btn-secondary');
                  $('.btnrules').removeClass('btn-secondary').addClass('btn-success');
              })
  
              $('.btncekdua').click( function() {
                  $('.test3').show();
                  $('.test').hide();
                  $('.test2').hide();
                  $('.test4').hide();
                  $('.btnconditionstudent').removeClass('btn-secondary').addClass('btn-success');
                  $('.btnrules').removeClass('btn-success').addClass('btn-secondary');
                  $('.btnparent').removeClass('btn-success').addClass('btn-secondary');
              })
  
  
              $('.btncektiga').click( function() {
                  $('.test4').show();
                  $('.test').hide();
                  $('.test2').hide();
                  $('.test3').hide();
                  $('.btnangket').removeClass('btn-secondary').addClass('btn-success');
                  $('.btnconditionstudent').removeClass('btn-success').addClass('btn-secondary');
                  $('.btnparent').removeClass('btn-success').addClass('btn-secondary');
                  $('.btnrules').removeClass('btn-success').addClass('btn-secondary');
              })
  
              $('.btncekduasebelumnya').click( function() {
                  $('.test').toggle();
                  $('.test2').hide();
                  $('.test3').hide();
                  $('.test4').hide();
                  $('.btnparent').removeClass('btn-secondary').addClass('btn-success');
                  $('.btnrules').removeClass('btn-success').addClass('btn-secondary');
              })
  
              $('.btncektigasebelumnya').click( function() {
                  $('.test2').toggle();
                  $('.test').hide();
                  $('.test3').hide();
                  $('.test4').hide();
                  $('.btnrules').removeClass('btn-secondary').addClass('btn-success');
                  $('.btnconditionstudent').removeClass('btn-success').addClass('btn-secondary');
              })
  
              $('.btncekempatsebelumnya').click( function() {
              $('.test3').toggle();
                  $('.test').hide();
                  $('.test2').hide();
                  $('.test4').hide();
                  $('.btnconditionstudent').removeClass('btn-secondary').addClass('btn-success');
                  $('.btnangket').removeClass('btn-success').addClass('btn-secondary');
  
              })
  
  
  
              $('.checkbox1').click(function() {
              $('.checkbox2').prop("checked", false);
              })
  
              $('.checkbox2').click(function() {
              $('.checkbox1').prop("checked", false);
              })
  
              $('.checkboxsex1').click(function() {
              $('.checkboxsex2').prop("checked",false);
              })
  
              $('.checkboxsex2').click(function() {
              $('.checkboxsex1').prop("checked",false);
              })
  
              $('.checkboxfisik1').click(function() {
              $('.checkboxfisik2').prop("checked",false);
              })
  
              $('.checkboxfisik2').click(function() {
              $('.checkboxfisik1').prop("checked",false);
              })
        
  
              var href = $('.linkhref').attr('href');
  
              $('.linkhref').attr('href', hostBaseUrl + href);
  
              var href2 = $('.linkhref2').attr('href');
  
              $('.linkhref2').attr('href', hostBaseUrl + href2);
  
  
              $('.checkboxnormalon').click(function() {
              $('.checkboxnormaloff').prop("checked", false);
              })
  
              $('.checkboxnormaloff').click(function() {
              $('.checkboxnormalon').prop("checked", false);
              })
  
              // tengkurap
  
              $('.checkboxtengkurapon').click(function() {
              $('.checkboxtengkurapoff').prop("checked", false);
              })
  
              $('.checkboxtengkurapoff').click(function() {
              $('.checkboxtengkurapon').prop("checked", false);
              })
  
              // merangkak
  
              $('.checkboxmerangkakon').click(function() {
              $('.checkboxmerangkakoff').prop("checked", false);
              })
  
              $('.checkboxmerangkakoff').click(function() {
              $('.checkboxmerangkakon').prop("checked", false);
              })
  
  
              // duduk
  
              $('.checkboxdudukon').click(function() {
              $('.checkboxdudukoff').prop("checked", false);
              })
  
              $('.checkboxdudukoff').click(function() {
              $('.checkboxdudukon').prop("checked", false);
              })
  
  
              // speak
  
              $('.checkboxspeakon').click(function() {
              $('.checkboxspeakoff').prop("checked", false);
              })
  
              $('.checkboxspeakoff').click(function() {
              $('.checkboxspeakon').prop("checked", false);
              })
  
  
              $('.vaksin').click(function() {
              $('.imunisasi1').prop("checked", false);
              $('.imunisasi2').prop("checked", false);
              $('.imunisasi3').prop("checked", false);
              })
  
              $('.imunisasi1').click(function() {
              $('.vaksin').prop("checked", false);
              })
  
              $('.imunisasi2').click(function() {
              $('.vaksin').prop("checked", false);
              })
  
              $('.imunisasi3').click(function() {
              $('.vaksin').prop("checked", false);
              })
  
      })
  
      
  
  });
  
  
  
  
  