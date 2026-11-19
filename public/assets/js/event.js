let numberTT = 1;

function addTicketType() {
    numberTT++;
    let tr = document.createElement('tr');
    tr.setAttribute('id',"tt"+numberTT)
    tr.innerHTML = "<tr>\n" +
        "                            <td>\n" +
        "                                <input name=\"name_type_ticket[]\" class=\"stringInput\" type=\"text\" placeholder=\"Входной билет\" size=\"55\" required>\n" +
        "                            </td>\n" +
        "                            <td>\n" +
        "                                <input name=\"price_type_ticket[]\" class=\"stringInput\" type=\"text\" placeholder=\"РУБ\" required>\n" +
        "                            </td>\n" +
        "                            <td>\n" +
        "                                <input name=\"size_type_ticket[]\" class=\"stringInput\" type=\"text\" placeholder=\"ШТ\" required>\n" +
        "                            </td>\n" +
        "                            <td>\n" +
        "                                <button onclick=\"delTicketType('tt'+numberTT)\" type=\"button\" class=\"pointer btn_close\">X</button>\n" +
        "                                <div class=\"upload\">\n" +
        "                                    <label class=\"input-file\">\n" +
        "                                        <input type=\"file\" name=\"img_type_ticket[]\" accept=\"image/*\" required>\n" +
        "                                        <span class=\"input-file-btn\">Загрузить файл</span>\n" +
        "                                    </label>\n" +
        "                                </div>\n" +
        "                            </td>\n" +
        "                        </tr>";
    document.getElementById('tbd').appendChild(tr)
}

function delTicketType(id) {
    document.getElementById(id).remove();
    numberTT--;
}

// document.getElementById("addType").onclick = addTicketType;
//
// function addTicketType() {
//     if(document.getElementById("nameTicket").value === "" || document.getElementById("price").value === ""){
//         document.getElementById("warning").innerHTML = "Поля с именем, ценой и количеством билетов обязательны";
//     }
//     else{
//         var wtr = document.createElement("tr");
//
//         var tdName = document.createElement("td");
//         var val1 = document.getElementById("nameTicket").value;
//         tdName.innerHTML = val1;
//
//         var tdPrice = document.createElement("td");
//         var val2 = document.getElementById("price").value;
//         tdPrice.innerHTML = val2;
//
//         var tdCount = document.createElement("td");
//         var val3 = document.getElementById("countTicket").value;
//         tdCount.innerHTML = val3;
//
//         var tdFile = document.createElement("td");
//         var val4 = document.getElementById("file").value;
//         tdFile.innerHTML = val4;
//
//         var del = document.createElement("td");
//         var val5 = '✖';
//         del.innerHTML = val5;
//         del.classList.add("delete");
//         del.onclick = deleteTd;
//
//         wtr.appendChild(tdName);
//         wtr.appendChild(tdPrice);
//         wtr.appendChild(tdCount);
//         wtr.appendChild(tdFile);
//         wtr.appendChild(del);
//         var dodac = document.getElementById("tbd");
//         dodac.appendChild(wtr);
//
//         document.getElementById("nameTicket").value="";
//         document.getElementById("price").value="";
//         document.getElementById("countTicket").value="";
//
//         function deleteTd(){
//             wtr.remove();
//         }
//     }
// }
//
//
