@extends('layouts.main_master')

@section('content')

<div class="about" style="padding-top: 20px;">
	<div class="container">
		<div class="about-main">
			<div class="about-top">
				<h1 class="text-center"></h1>
			</div>

			<div class="about-bootom" style="margin-top:30px;">
				<div class="panel panel-default">
					<form class="form-horizontal" id="formWizard2" method="post" action="#">
						 <input type="hidden" name="_token" id="_token" value="GIRRCeWQtfBgT69MoprzfcTGrr3GsC26GvwxU9NM">
						 <div class="panel-heading">
						 	 Purchase Wizard     <span style="color: red;padding-left: 40px;">(Please no ATMs transfer, No third-partys payment, all payments must be done via your bank account)</span>
						 </div>

						  <div class="panel-tab">
                                <ul class="wizard-steps">
                                    <li class="active">
                                        <a>Step 1</a>
                                    </li>
                                    <li>
                                        <a>Step 2</a>
                                    </li>
                                    <li>
                                        <a>Step 3</a>
                                    </li>
                                    <li>
                                        <a>Step 4</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="panel-body">
                                <div class="tab-content">
                                	<div class="tab">
                                		<h3>Wizard1</h3>
                                	</div>


                                	<div class="tab">
                                		<h3>Wizard2</h3>
                                	</div>

                                	<div class="tab">
                                		<h3>Wizard3</h3>
                                	</div>

                                	 <div style="overflow:auto">
                                               
                                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                                
                                        </div>
                                </div>
                            </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@section('script')
<script>

	var currentTab = 0;
	showTab(currentTab);

	function showTab(n) {
		var x = document.getElementsByClassName("tab");
		//x[n].style.display = "block";

		if(n == 0){
			
			document.getElementById("prevBtn").style.display = "none";
			
		}else {
			
			document.getElementById("prevBtn").style.display = "inline";
			
		}

		if(n = (x.length - 1)) {
			document.getElementById("nextBtn").innerHTml = "SUbmit";
		} else {
			document.getElementById("prevBtn").innerHTml = "Next";
		}
		fixStepIndicator(n);

	}


	
function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 ) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("formWizard2").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  
  return valid; // return the valid status
}


	function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("tab");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

</script>
@stop