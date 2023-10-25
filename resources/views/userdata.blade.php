<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Submitted Supplier Details</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<style>
  table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}

</style>
<body>

    
    <div class="container">

    <h1 style="color: black;background-color:rgb(17, 240, 17);text-align:center;padding:3px;margin:4px;">Successful Form    submission</h1>

    <table class="table table-bordered">
       
            <tr>
                <td colspan="4"><h3>1.Business Details</h3></td>
            </tr>

            <tr>
                <th scope="col">Country</th>
                <th scope="col">Category</th>
                <th scope="col">SubCategory</th>
                <th scope="col">Business Name</th>
            </tr>
           

          

          <tr>
            <td>{{$country}}</td>
            <td>{{$category}}</td>
            <td>{{$SubCategory}}</td>
            <td>{{$BusinessName}}</td>
          </tr>

          <tr>
            <th scope="col">Type of Business</th>
            <th scope="col">Nature of Business</th>
            <th scope="col">Certificate of Registration Incorporation number</th>
            <th scope="col">Revenue Authority Taxpayer’s Identification Number</th>
          </tr>



          <tr>
            <td>{{$TypeOfBusiness}}</td>
            <td>{{$natutreofbusiness}}</td>
            <td>{{$Certificate_of_Registration}}</td>
            <td>{{$Revenue_Authority_Taxpayers_Identification_Number}}</td>
          </tr>
         

            <tr>
                <th scope="col">Tax compliance certificate expiration date</th>
                <th scope="col">Physical address</th>
                <th scope="col">Company Email</th>
                <th scope="col">National Pension Authority (NPSA) Registration No</th>
              </tr>


            <tr>
            <td>{{$Tax_compliance_certificate_expiration}}</td>
            <td>{{$physical_address}}</td>
            <td>{{$company_email}}</td>
            <td>{{$NAPSA_Compliance_Status_certificate}}</td>
          </tr>


          <tr>
            <th scope="col">Personal contact :</th>
            <th scope="col">Company Telephone number</th>
            <th scope="col">Contact Telephone number</th>
            <th scope="col"></th>
          </tr>


          <tr>
            <td>{{$contact_person}}</td>
            <td>{{$company_telephone}}</td>
            <td>{{$contact_person_telephone}}</td>
        </tr>




          <tr>
            <td colspan="4"><h3>2.Financial Information</h3></td>
        </tr>

        <tr>
            <th scope="col">Account name :</th>
            <th scope="col">Bank Account number</th>
            <th scope="col">Bank name</th>
            <th scope="col">Bank Branch</th>
          </tr>

          <tr>
            <td>{{$Account_Name}}</td>
            <td>{{$Bank_Account}}</td>
            <td>{{$Bank_Name}}</td>
            <td>{{$Bank_Branch}}</td>
          </tr>
  

           <tr>
            <th scope="col">Branch code :</th>
            <th scope="col">Account currency</th>
            <th scope="col">Company financial contact person</th>
            <th scope="col">Contact person email</th>
          </tr>

          <tr>
            <td>{{$Branch_code}}</td>
            <td>{{$Account_currency}}</td>
            <td>{{$company_financial_contact}}</td>
            <td>{{$contact_person_email}}</td>
          </tr>

         

           <tr>
            <th scope="col">Contact person phone number</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>

          <tr>
            <td>{{$contact_person_telephone}}</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>

          <tr>
            <td colspan="4"><h3>3.Capacity Levels</h3></td>
         </tr>

         <tr>
            <th scope="col">Annual turnover excluding this contract</th>
            <th scope="col">Current assets</th>
            <th scope="col">Current liabilities</th>
            <th scope="col">Current ratio (current assets/current liabilities)</th>
          </tr>

          <tr>
            <td>{{$Annual_turnover}}</td>
            <td>{{$Current_assets}}</td>
            <td>{{$Current_liabilities}}</td>
            <td>{{$Current_ratio}}</td>
           </tr>

           <tr>
            <th scope="col">No of years in business :</th>
            <th scope="col">Number of employees</th>
            <th scope="col">Other employees</th>
            <th scope="col">Relevant specialisation</th>
          </tr>


          <tr>
            <td>{{$No_of_years_in_business}}</td>
            <td>{{$Number_of_employees}}</td>
            <td>{{$Other_employees}}</td>
            <td>{{$Relevant_specialisation}}</td>
           </tr>

           <tr>
            <th scope="col">A maximum of 10 Projects|contracts :</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>

          
          <tr>
            <td>{{$maximum_of_10_Projects_contracts}}</td>
            <td></td>
            <td></td>
            <td></td>
           </tr>


          <tr>
            <td colspan="4"><h3>4.Required Documents</h3></td>
         </tr>

         <tr>
            <td>{{$saved_documents}}</td>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr> 
       
      </table>
      

      
      <p> Thanks & Regards </p>
   
    </div>
</body>
</html>