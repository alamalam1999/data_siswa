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
                    <a href="{{ route('admin.pricing.export_excel') }}">
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
                    <th>NO</th>
                    <th>ID</th>        
                    <th>PPDB_ID</th>    
                    <th>PAYMENT_TYPE</th>
                    <th>PAYMENT_CODE</th>
                    <th>CONFIRMATION_STATUS</th>
                    <th>DATE_SEND</th>
                    <th>BANK_OWNER_NAME</th>
                    <th>BANK_CODE</th>
                    <th>ACCOUNT_NUMBER</th>
                    <th>COST</th>
                    <th>IMAGE_CONFIRMATION</th>
                    <th>CREATED_AT</th>
                    <th>UPDATED_AT</th>
                    <th>UPDATED_AT</th>                               
               </tr>
            </thead>
            <tbody>

           <?php
           $no = 1;

           
           ?>   
            @foreach($payment_reregistration as $payment_reregistrations)           
            <?php 

                $file_additionaldua = [];                       

            ?>
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $payment_reregistrations->id  }}</td>
                    <td>{{ $payment_reregistrations->ppdb_id   }}</td>
                    <td>{{ $payment_reregistrations->payment_type    }}</td>
                    <td>{{ $payment_reregistrations->payment_code   }}</td>
                    <td>{{ $payment_reregistrations->confirmation_status   }}</td>
                    <td>{{ $payment_reregistrations->date_send    }}</td>
                    <td>{{ $payment_reregistrations->bank_owner_name    }}</td>
                    <td>{{ $payment_reregistrations->bank_code }}</td>
                    <td>{{ $payment_reregistrations->account_number }}</td>
                    <td>{{ $payment_reregistrations->cost }}</td>
                    <td>{{ $payment_reregistrations->image_confirmation }}</td> 
                    <td>{{ $payment_reregistrations->created_at }}</td>
                    <td>{{ $payment_reregistrations->updated_at }}</td>
                    <td>{{ $payment_reregistrations->updated_by }}</td>
                    
                    
                </tr>  

            @endforeach
            </tbody>
        </table>        
    </div>  
     </div> 
</body>
</html>

