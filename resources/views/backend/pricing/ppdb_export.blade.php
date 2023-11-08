<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card">
        <div class="card-header pt-7 pb-7">
    
            <div class="row">
                <div>
                    <a href="{{ route('admin.import.export_excel') }}">
                    <button id="btn-search" type="submit" class="testing2 btn btn-flex btn-primary">Pricing Gelombang 2</button>
                    </a>
                </div>
                <div class="col">
                  
                </div>
              </div>      
        </div>
    </div>
    
    <div>
     <div class="card">
          <table id="myTable">
              <thead>
                <tr>
                    <TH>NO</TH>
                    <TH>ID</TH>        
                    <TH>REGISTRATION_SCHEDULE_ID</TH>    
                    <TH>DOCUMENT_NO</TH>
                    <TH>DOCUMENT_STATUS</TH>
                    <TH>SCHOOL_RECOMENDATION_NOTE</TH>
                    <TH>ID_USER</TH>
                    <TH>SCHOOL_SITE</TH>
                    <TH>STAGE</TH>
                    <TH>CLASSES</TH>
                    <TH>STUDENT_STATUS</TH>
                    <TH>FULLNAME</TH>
                    <TH>GENDER</TH>
                    <TH>PLACE_OF_BIRTH</TH>
                    <TH>DATE_OF_BIRTH</TH>
                    <TH>RELIGION</TH>    
                    <TH>NATIONALITY</TH> 
                    <TH>ADDRESS</TH> 
                    <TH>HOME_PHONE</TH> 
                    <TH>HAND_PHONE</TH>  
                    <TH>SCHOOL_ORIGIN</TH>     
                    <TH>FAMILY_CARD</TH>   
                    <TH>BIRTH_CERTIFICATE</TH>      
                    <TH>LAST_REPORT</TH>  
                    <TH>ACADEMIC_CERTIFICATE</TH>   
                    <TH>KIA_BOOK</TH>   
                    <TH>FILE_ADDITIONAL</TH>
                    <TH>MEDCO_EMPLOYEE</TH>
                    <TH>MEDCO_EMPLOYEE_FILE</TH>
                    <TH>PPDB_DISCOUNT</TH>
                    <TH>STUDIED_BEFORE</TH>
                    <TH>FILE_ADDITIONAL_SATU</TH>
                    <TH>FILE_ADDITIONAL_DUA</TH>
                    <TH>FILE_ADDITIONAL_TIGA</TH>
                    <TH>FILE_ADDITIONAL_EMPAT</TH>
                    <TH>FILE_ADDITIONAL_LIMA</TH>
                    <TH>TINGKAT_SATU</TH>
                    <TH>TINGKAT_DUA</TH>
                    <TH>TINGKAT_TIGA</TH>
                    <TH>TINGKAT_EMPAT</TH>
                    <TH>TINGKAT_LIMA</TH>
                    <TH>DESKRIPSI_SATU</TH>
                    <TH>DESKRIPSI_DUA</TH>
                    <TH>DESKRIPSI_TIGA</TH>
                    <TH>DESKRIPSI_EMPAT</TH>
                    <TH>DESKRIPSI_LIMA</TH>
                    <TH>STATUS_SISWA</TH>
                    <TH>GAJI</TH>
                    <TH>SLIP_GAJI_PARENT</TH>
                    <TH>UPDATED_BY</TH>
                    <TH>CREATED_AT</TH>
                    <TH>UPDATED_AT</TH>
                    <TH>REJECTED_AT</TH>
                    <TH>REJECTED_BY</TH>
               </tr>
              </thead>
              <tbody>
  
             <?php
             $no = 1;
             ?>   
              @foreach($ppdb as $ppdbs)
  
              <?php 
  
              ?>
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $ppdbs->id  }}</td>
                    <td>{{ $ppdbs->registration_schedule_id    }}</td>
                    <td>{{ $ppdbs->document_no   }}</td>
                    <td>{{ $ppdbs->document_status   }}</td>
                    <td>{{ $ppdbs->school_recomendation_note  }}</td>
                    <td>{{ $ppdbs->id_user }}</td>
                    <td>{{ $ppdbs->school_site }}</td>
                    <td>{{ $ppdbs->stage }}</td>
                    <td>{{ $ppdbs->classes }}</td>
                    <td>{{ $ppdbs->student_status }}</td> 
                    <td>{{ $ppdbs->fullname }}</td>
                    <td>{{ $ppdbs->gender }}</td>
                    <td>{{ $ppdbs->place_of_birth }}</td>
                    <td>{{ $ppdbs->date_of_birth }}</td>
                    <td>{{ $ppdbs->religion }}</td>
                    <td>{{ $ppdbs->nationality }}</td>
                    <td>{{ $ppdbs->address }}</td>
                    <td>{{ $ppdbs->home_phone }}</td>
                    <td>{{ $ppdbs->hand_phone }}</td>
                    <td>{{ $ppdbs->school_origin }}</td>
                    <td>{{ $ppdbs->family_card }}</td>
                    <td>{{ $ppdbs->birth_certificate }}</td>
                    <td>{{ $ppdbs->last_report }}</td>
                    <td>{{ $ppdbs->academic_certificate }}</td>
                    <td>{{ $ppdbs->kia_book }}</td>
                    <td>{{ $ppdbs->file_additional }}</td>
                    <td>{{ $ppdbs->medco_employee }}</td>
                    <td>{{ $ppdbs->medco_employee_file }}</td>  
                    <td>{{ $ppdbs->ppdb_discount }}</td>  
                    <td>{{ $ppdbs->studied_before }}</td>  
                    <td>{{ $ppdbs->file_additional_satu }}</td>  
                    <td>{{ $ppdbs->file_additional_dua }}</td>                                   
                    <td>{{ $ppdbs->file_additional_tiga }}</td>  
                    <td>{{ $ppdbs->file_additional_empat }}</td>  
                    <td>{{ $ppdbs->file_additional_lima }}</td>  
                    <td>{{ $ppdbs->tingkat_satu }}</td>  
                    <td>{{ $ppdbs->tingkat_dua }}</td>  
                    <td>{{ $ppdbs->tingkat_tiga }}</td>  
                    <td>{{ $ppdbs->tingkat_empat }}</td>                                   
                    <td>{{ $ppdbs->tingkat_lima }}</td>  
                    <td>{{ $ppdbs->deskripsi_satu }}</td>  
                    <td>{{ $ppdbs->deskripsi_dua }}</td>  
                    <td>{{ $ppdbs->deskripsi_tiga }}</td>  
                    <td>{{ $ppdbs->deskripsi_empat }}</td>  
                    <td>{{ $ppdbs->deskripsi_lima }}</td>  
                    <td>{{ $ppdbs->status_siswa }}</td>                                   
                    <td>{{ $ppdbs->gaji }}</td>  
                    <td>{{ $ppdbs->slip_gaji_parent }}</td>  
                    <td>{{ $ppdbs->updated_by }}</td>  
                    <td>{{ $ppdbs->created_at }}</td>  
                    <td>{{ $ppdbs->updated_at }}</td>  
                    <td>{{ $ppdbs->rejected_at }}</td>  
                    <td>{{ $ppdbs->rejected_by }}</td>  
                </tr>  
  
              @endforeach
              </tbody>
          </table>        
      </div>  
     </div> 
</body>
</html>

