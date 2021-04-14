@extends('shop.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
My Expense || {{$world->name}}
Dashboard
@endsection
@section('content')
<div class="container-fluid">
    <form enctype="multipart/form-data" action="{{url('/expense_store')}}" method="post">
        @csrf 
              <div class="row">  
            <div class="col-sm-3 form-group"> 
                <label>Expense type</label>
                <select name="type"   class="form-control select2bs4" style="width: 100%;">
                  <option value="Daily">Daily</option>
                  <option value="Monthly">Monthly</option>
                  <option value="Yearly">Yearly</option>
                  <option value="Salary">Salary</option>
                    </select>
                </div> 
                <div class="col-sm-3 form-group"> 
                    <label>Actual Expense </label>
                    <select name="purpose"   class="form-control select2bs4" required style="width: 100%;">
                      <option value="">Select  Purpose</option>
                      <option value="Photocopy-Paper">Photocopy Paper</option>
                      <option value="Photo-Paper">Photo Paper</option>  
                      <option value="Ofset-Paper">Ofset Paper</option>     
                      <option value="Color-Paper">Color Paper</option>     
                      <option value="Photocopy-Ink">Photocopy Ink</option>     
                      <option value="Printer-Ink">Printer Ink</option>     
                      <option value="Printer-Toner">Printer Toner</option>     
                      <option value="Printer-Cartidge">Printer Cartidge</option>     
                      <option value="Printer-Servicing">Printer Servicing</option>     
                      <option value="Photocopy-Servicing">Photocopy Servicing</option>     
                      <option value="Photocopy-Parts">Photocopy Parts</option>     
                      <option value="Stamp-Pad">Stamp Pad</option>     
                      <option value="Stationery-expense">Stationery expense</option>     
                      <option value="Water-bill">Water bill</option>     
                      <option value="Internet-bill">Internet bill </option>     
                      <option value="Electriciy-bill">Electriciy bill</option> 
                      <option value="Shop-Rent">Shop Rent</option> 
                      <option value="Staff-Salary">Staff Salary</option> 
                      <option value="Repair-expense">Repair expense</option> 
                      <option value="Laminating-Pouch">Laminating Pouch</option> 
                      <option value="Seal-Ink">Seal Ink</option> 
                      <option value="Seal-Handle">Seal Handle</option> 
                      <option value="Tracing-Paper">Tracing Paper</option> 
                      <option value="Computer-servicing">Computer servicing</option> 
                      <option value="Computer-parts">Computer parts</option> 
                      <option value="Loan-Paid">Loan Paid</option> 
                      <option value="Appayan">Appayan</option> 
                      <option value="Others">Others</option> 
                        </select>
                    </div>  
               <div class="col-sm-4 form-group">
                  <label>Note</label>
                  <input class="form-control "  placeholder="Details Your Expense" type="text"  name="note">             
              </div> 
                <div class="col-sm-2 form-group">
                  <label>Amount</label>
                  <input class="form-control " placeholder="Expense Amount" required type="number" min="1" name="amount">   
                  <br>
{{-- 
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="expense" id="exampleRadios1" value="ActualExpense" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      Actual Expense
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="expense" id="exampleRadios2" value="GeneralExpense">
                    <label class="form-check-label" for="exampleRadios2">
                      General Expense
                    </label>
                  </div>  --}}
                  
                  
              </div> 
              
               </div>        
          <div class="modal-footer">
              <button type="submit" class="btn btn-success">Submit</button>
          </div>
      </form>
    </div> 

    <div class="modal fade" id="exampleModalCenter_edit" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <form enctype="multipart/form-data" action="{{url('/expense_update')}}" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">           
              <div class="col-sm-6 form-group"> 
                <label>Expense type</label>
                <select name="type"   class="form-control select2bs4 type" style="width: 100%;">
                    <option value="Daily">Daily</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Yearly">Yearly</option>
                    <option value="Salary">Salary</option>
                    </select>
                    <input class="cId" type="hidden" name="id" id="id">
                </div> 
                <div class="col-sm-6 form-group"> 
                    <label>Actual Expense </label>
                    <select name="purpose"   class="form-control select2bs4 purpose" required style="width: 100%;">
                      <option value="">Select  Purpose</option>
                      <option value="Photocopy-Paper">Photocopy Paper</option>
                      <option value="Photo-Paper">Photo Paper</option>  
                      <option value="Ofset-Paper">Ofset Paper</option>     
                      <option value="Color-Paper">Color Paper</option>     
                      <option value="Photocopy-Ink">Photocopy Ink</option>     
                      <option value="Printer-Ink">Printer Ink</option>     
                      <option value="Printer-Toner">Printer Toner</option>     
                      <option value="Printer-Cartidge">Printer Cartidge</option>     
                      <option value="Printer-Servicing">Printer Servicing</option>     
                      <option value="Photocopy-Servicing">Photocopy Servicing</option>     
                      <option value="Photocopy-Parts">Photocopy Parts</option>     
                      <option value="Stamp-Pad">Stamp Pad</option>     
                      <option value="Stationery-expense">Stationery expense</option>     
                      <option value="Water-bill">Water bill</option>     
                      <option value="Internet-bill">Internet bill </option>     
                      <option value="Electriciy-bill">Electriciy bill</option> 
                      <option value="Shop-Rent">Shop Rent</option> 
                      <option value="Staff-Salary">Staff Salary</option> 
                      <option value="Repair-expense">Repair expense</option> 
                      <option value="Laminating-Pouch">Laminating Pouch</option> 
                      <option value="Seal-Ink">Seal Ink</option> 
                      <option value="Seal-Handle">Seal Handle</option> 
                      <option value="Tracing-Paper">Tracing Paper</option> 
                      <option value="Computer-servicing">Computer servicing</option> 
                      <option value="Computer-parts">Computer parts</option> 
                      <option value="Loan-Paid">Loan Paid</option> 
                      <option value="Appayan">Appayan</option> 
                      <option value="Others">Others</option>
                        </select>
                    </div>  
               <div class="col-sm-12 form-group">
                  <label>Note</label>
                  <input class="form-control note"  placeholder="Details Your Expense" type="text"  name="note">             
              </div> 
                <div class="col-sm-12 form-group">
                  <label>Amount</label>
                  <input class="form-control amount" placeholder="Expense Amount" required type="number" min="1" name="amount">              
              </div> 
                </div>
               </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
    </div>
    </div>
    </div>
    <br> 
    <div class="card shadow">
        <div class="card-header ">
        <div class="row">
            <div class="col-md-6"><h5 class="m-0 font-weight-bold ">My Expense History</h5></div>   
        </div> 
        </div> 
        <div class="card-body">
          <div class="table-responsive">
           <table id="example" class="table table-bordered table-hover">
              <thead>
                <tr >
                  <th>TrxID</th>
                  <th>Type</th>
                  <th>Purpose</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Action</th>
           
                </tr>
              </thead>
              <tbody>
                  @foreach($expense as $sale)
             <tr>
                <td>{{$sale->id}}</td>
                <td>{{$sale->type}} </td>           
                <td>{{$sale->purpose}}</td>
                <td>{{ date('d-M-Y', strtotime($sale->created_at)) }}</td>
                <td>{{$sale->amount}}</td>
                @if($sale->status==0)
                <td> <span class="badge bg-danger">Pending</span></td>
                @else
                <td> <span class="badge bg-success">Approve</span></td>
                @endif
                <td> <div class="dropdown show">
                  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  </a>  
                  @if($sale->status==0) 
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="" onclick= 'edit({{$sale->id}});' data-toggle="modal" id="edit" 
                          data-target="#exampleModalCenter_edit"> Edit</a>                   
                     <a  class="dropdown-item"  href="{{url('/expense_delete/'.$sale->id)}}" onclick='return confirm("Confirm Delete ??")' >Delete</a>
                  </div>
                    @endif
                  </div>
              </td>
             </tr>

             @endforeach
         
              </tbody>
            </table>
          </div>
        </div>
      </div>
        <script>
          function edit(id) {
                  var x =id;
                  
                  $.ajax({
                      type:'GET',
                      url:"{{url('/expense_edit')}}/"+x,
                      success:function(response){
                          console.log(response);
                          $('.type').val(response.type);        
                          $('.purpose').val(response.purpose);                
                          $('.note').val(response.note);                
                          $('.amount').val(response.amount);                              
                          $('.cId').val(response.id);
                   
                      },
                          
                  });
              }
          
          </script>
@endsection