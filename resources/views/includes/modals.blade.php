`  <div class="modal fade" id="busModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header w3-flat-peter-river">
          <button type="button" class="close w3-red w3-padding-small" data-dismiss="modal">&times;</button>
          <h4 class="modal-title w3-text-white text-center"><strong>Bus Service Form/የባስ አገልግሎት ቅጽ</strong></h4>   
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label for="fname" class="w3-text-black">Guardian Fullname/ የተቀባይ ሙሉ ስም</label>
            <div class="row">
              <span class="col-md-4">   
                <input name="bgFname" class="form-control" type="text" placeholder="First Name / ስም">
              </span>
              <span class="col-md-4">
                <input name="bgMname" class="form-control" type="text" placeholder="Middle Name / የአባት ስም">
              </span>
              <span class="col-md-4">
                <input name="bgLname" class="form-control" type="text" placeholder="Last Name / የአያት ስም">
              </span> 
           </div>  
          </div>
          <div class="form-group">
             <label class="w3-text-black">Relation/ ዝምድና</label>
             <input name="brelation" type="text" class="form-control" placeholder="Relationship/ዝምድና">
          </div>
          <div class="form-group">
             <label class="w3-text-black">Distance(Km) / ርቀት( በ ኪሜ)</label>
             <input name="bdistance" type="text" class="form-control" placeholder="Distance/ርቀት">
          </div>
          <div class="form-group">
            <label class="w3-text-black">Address/ አድራሻ</label>
            <div class="row">
               <span class="col-md-4"> <input name="bkebele" type="text" class="form-control" placeholder="kebele/ቀበሌ"></span>
               <span class="col-md-4"> <input name="bhno" type="text" class="form-control" placeholder="House No/የቤት ቁጥር"></span>
               <span class="col-md-4"> <input name="bmobile" type="text" class="form-control" placeholder="Mobile/ስልክ ቁጥር"></span>
            </div>
          </div>
      </div>
          
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
        </div>
        
      </div>
    </div>
  </div>

<!-- to register pre school data -->

 <div class="modal fade" id="newStudModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header w3-flat-peter-river">
          <button type="button" class="close w3-red w3-padding-small" data-dismiss="modal">&times;</button>
          <h4 class="modal-title w3-text-white text-center"><strong>ከሌላ ትምህርት ቤት ለመጡ ተማሪዎች የሚሞላ ቅጽ</strong></h4>   
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="school">School</label>
                <input class="form-control" name="school" type="text" placeholder="previous school">
            </div>
            <div class="form-group">
                  <div class="row">
                    <div class="col-md-3"><label>Last Year Class</label>
                        <input class="form-control" name="preclass" type="text" placeholder="pre class">
                    </div>
                    <div class="col-md-3"><label>GPA</label>
                        <input class="form-control" name="gpa" type="decimal" placeholder="gpa">
                    </div>
                    <div class="col-md-6"><label>Behaviour</label>
                        <input class="form-control" name="behave" type="text" placeholder="pre behaviour">
                    </div>
                  </div>  
            </div>
            <div class="form-group">
                  <label for="descript">Student additional Information</label>
                  <textarea name="descript" class="form-control" style="height: 106px;" placeholder="extra information"></textarea>
            </div>
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
          </div>  
      </div>
    </div>
  </div>






