document.getElementById("btn_new_expense").addEventListener("click",function(o){o.preventDefault();const e=document.getElementById("modalNewExpense"),t=new Date,a=t.getDate()<10?"0"+t.getDate():t.getDate(),l=today.getMonth()+1<10?"0"+(today.getMonth()+1):today.getMonth()+1,n=t.getFullYear()+"-"+l+"-"+a;e.querySelector("#update").value="0",e.querySelector("#bank_id").value="",e.querySelector("#category_id").value="",e.querySelector("#description").value="",e.querySelector("#amount").value="",e.querySelector("#due_date").value=n,e.querySelector("#repeat").value="",e.querySelector("#notes").value="",console.log(n)});document.getElementById("btn_new_income").addEventListener("click",function(o){o.preventDefault();const e=document.getElementById("modalNewIncome"),t=new Date,a=t.getDate()<10?"0"+t.getDate():t.getDate(),l=today.getMonth()+1<10?"0"+(today.getMonth()+1):today.getMonth()+1,n=t.getFullYear()+"-"+l+"-"+a;e.querySelector("#update").value="0",e.querySelector("#bank_id").value="",e.querySelector("#company").value="",e.querySelector("#amount").value="",e.querySelector("#due_date").value=n,e.querySelector("#repeat").value="",e.querySelector("#notes").value="",console.log(n)});document.getElementById("month").addEventListener("change",function(o){o.preventDefault();const e=o.target.value;window.location.href="/dashboard/?month="+e});
