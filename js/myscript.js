// myscript.js 
function day_calculation(a, b) {
    var date1 = new Date(a);
    var date2 = new Date(b);

    var Difference_In_Time = date2.getTime() - date1.getTime();
  
    var Difference_In_Days = (Difference_In_Time / (1000 * 3600 * 24)) + 1 ;
    
    // let ans = "( " +  Difference_In_Days + " Days )";
  return Difference_In_Days;
}

