console.log("test : on est dans le script");


window.onload = () => {
    Array.from(document.querySelectorAll(' .select ')).forEach( e => {
        e.addEventListener('change', evenement => {
            console.log("on a changé une option");
            let elementHTML = evenement.target;
            let valeur = elementHTML.value;
            //console.log(valeur);
            let vLigne = elementHTML.parentNode.parentNode.firstChild.textContent;
            //console.log(vLigne);
            let vColonne = elementHTML.className.split(" ")[1];
            /*vColonne = vColonne.replace('-','/');*/
            console.log(vColonne); 
            fetch( 
                'modifSelect.php' ,
                { 
                    /*headers: new Headers() ,*/
                    /*headers: {'Content-Type': 'application/json'},*/
                    method: 'POST', 
                    /*body: JSON.stringify({valeur,vLigne,vColonne})*/
                    body: new URLSearchParams("valeur="+valeur+"&vLigne="+vLigne+"&vColonne="+vColonne)
                }
            ).catch(function(error) {
                console.log('Il y a eu un problème avec l\'opération fetch: ' + error.message); // display d'erreur
              });
            location.reload(); // on reactualise pour que les changements s'affiche dans le tableaux des absences
            
        });
    });

    Array.from(document.querySelectorAll('.supp')).forEach( e => {
        e.addEventListener('click',evenement => {
            console.log("on est dans le script de suppression de donnees");
            let elementHTML = evenement.target;
            let valeurId = elementHTML.parentNode.parentNode.id;
            console.log(valeurId);
            fetch(
                'modifSupp.php',
                {
                    method: 'POST',
                    body: new URLSearchParams("id="+valeurId)
                }
            ).catch(function(error) {
                console.log('Il y a eu un problème avec l\'opération fetch: ' + error.message); // display d'erreur
              });
              location.reload();
        })
    });

    Array.from(document.querySelectorAll('.modif')).forEach( element => {
        element.addEventListener('click', evenement => {
            let elementHTML = evenement.target;
            let valeurId = elementHTML.parentNode.parentNode.id;
            Array.from(document.getElementById(valeurId).childNodes).slice(1,8).forEach(td => {
                td.setAttribute("contentEditable","true");
                td.style.backgroundColor = "lightblue";
                //possibimité de passer par une classe
                
            });
            element.style.display = "none";
            document.getElementById(valeurId).childNodes[8].childNodes[1].style.display = "initial";
        })
    });

    Array.from(document.querySelectorAll('.save')).forEach( element => {
        element.addEventListener('click',evenement => {
            let elementHTML = evenement.target;
            let valeurId = elementHTML.parentNode.parentNode.id;
            Array.from(document.getElementById(valeurId).childNodes).slice(1,8).forEach(td => {
                td.setAttribute("contentEditable","false");
                td.style.backgroundColor = "rgb(194, 209, 209)";
                console.log(td.textContent);
                
            });

            let tabInformation = Array.from(document.getElementById(valeurId).childNodes).slice(1,8);
            let param1 = tabInformation[0].textContent;
            let param2 = tabInformation[1].textContent;
            let param3 = tabInformation[2].textContent;
            let param4 = tabInformation[3].textContent;
            let param5 = tabInformation[4].textContent;
            let param6 = tabInformation[5].textContent;
            let param7 = tabInformation[6].textContent;
            

            element.style.display = "none";
            document.getElementById(valeurId).childNodes[8].childNodes[0].style.display = "initial";
            fetch(
                'ModifRencontre.php',
                {
                    method: 'POST',
                    body: new URLSearchParams("param1="+param1+"&param2="+param2+"&param3="+param3+"&param4="+param4+"&param5="+param5+"&param6="+param6+"&param7="+param7+"&id="+valeurId)
                }
            );
            location.reload();
        })
    });



    Array.from(document.querySelectorAll('.ajout')).forEach(element => {
        element.addEventListener('click', evenement => {
            elementHtml = evenement.target;
            let valeurId = element.parentNode.parentNode.id;
            console.log("test :"+valeurId);

            let tabInformation = Array.from(document.getElementById(valeurId).childNodes).slice(1,8);
            let competition = tabInformation[0].textContent;
            let equipe = tabInformation[1].textContent;
            let equipeAdv = tabInformation[2].textContent;
            let date = tabInformation[3].textContent;
            let heure = tabInformation[4].textContent;
            let terrain = tabInformation[5].textContent;
            let site = tabInformation[6].textContent;
            
            fetch(
                'ModifConvoc.php',
                {
                    method: 'POST',
                    body: new URLSearchParams("competition="+competition+"&equipe="+equipe+"&equipeAdv="+equipeAdv+"&date="+date+"&heure="+heure+"&terrain="+terrain+"&site="+site+"&id="+valeurId)
                }
            ).catch(function(error) {
                console.log('Il y a eu un problème avec l\'opération fetch: ' + error.message); // display d'erreur
              });
            location.reload();
        });
    })

    Array.from(document.querySelectorAll('.check')).forEach( element => {
        element.addEventListener('click' , evenement => {
            
        });
    })

}










//test de la manipulation du dom
            /*let tabInformation = Array.from(document.getElementById(valeurId).childNodes).slice(0,8);

            baliseTh1 = document.createElement("th");
            baliseTh2 = document.createElement("th");
            baliseTh3 = document.createElement("th");
            baliseTh4 = document.createElement("th");
            baliseTh5 = document.createElement("th");
            baliseTh6 = document.createElement("th");
            baliseTh7 = document.createElement("th");
            baliseTh8 = document.createElement("th");

            balise1 = document.createElement("tr");
            balise2 = document.createElement("tr");
            balise3 = document.createElement("tr");
            balise4 = document.createElement("tr");
            balise5 = document.createElement("tr");
            balise6 = document.createElement("tr");
            balise7 = document.createElement("tr");
            balise8 = document.createElement("tr");

            baliseTd1 = document.createElement("td");
            baliseTd2 = document.createElement("td");
            baliseTd3 = document.createElement("td");
            baliseTd4 = document.createElement("td");
            baliseTd5 = document.createElement("td");
            baliseTd6 = document.createElement("td");
            baliseTd7 = document.createElement("td");
            baliseTd8 = document.createElement("td");

            baliseTable = document.createElement("table");
            baliseTable.classList.add("etat");

            let racine = document.getElementById('convoc');
            racine.append(baliseTable);

            baliseTable.appendChild(balise1);
            baliseTable.appendChild(balise2);
            baliseTable.appendChild(balise3);
            baliseTable.appendChild(balise4);
            baliseTable.appendChild(balise5);
            baliseTable.appendChild(balise6);
            baliseTable.appendChild(balise7);
            baliseTable.appendChild(balise8);

            balise1.appendChild(baliseTh1).appendChild(document.createTextNode(param1));
            balise2.appendChild(baliseTh2).appendChild(document.createTextNode(param2));
            balise3.appendChild(baliseTh3).appendChild(document.createTextNode(param3));
            balise4.appendChild(baliseTh4).appendChild(document.createTextNode(param4));
            balise5.appendChild(baliseTh5).appendChild(document.createTextNode(param5));
            balise6.appendChild(baliseTh6).appendChild(document.createTextNode(param6));
            balise7.appendChild(baliseTh7).appendChild(document.createTextNode(param7));
            balise8.appendChild(baliseTh8).appendChild(document.createTextNode(param8));*/
