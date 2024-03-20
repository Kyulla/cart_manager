async function getPhotos() {
    const response = await fetch("https://jsonplaceholder.typicode.com/photos");
    const photos = await response.json();
    itemCard(photos);
}

function cambiaPagina(selezione) {
    if (selezione === "-") {
        if (pagina != 0) {
            pagina--;
            document.getElementById("display").innerHTML = groupedPhotos[pagina];
            document.getElementById("+").innerHTML = "Avanti " + (pagina+1);
            document.getElementById("pagina").innerHTML = "Pagina " + pagina;
            if(pagina === 0){
                document.getElementById("-").disabled = true;
            }
            else{
                document.getElementById("-").innerHTML = "Indietro " + (pagina-1);
                document.getElementById("+").disabled = false;
            }
        }
    }
    else if (pagina < (groupedPhotos.length - 1)) {
        pagina++;
        document.getElementById("display").innerHTML = groupedPhotos[pagina];
        document.getElementById("-").innerHTML = "Indietro " + (pagina-1);
        document.getElementById("pagina").innerHTML = "Pagina " + pagina;
        if((pagina + 1) === groupedPhotos.length){
            document.getElementById("+").disabled = true;
        }
        else{
            document.getElementById("+").innerHTML = "Avanti " + (pagina+1);
        }
        if(pagina != 0){
            document.getElementById("-").disabled = false;
        }
    }
}

function cardConstructor(title, url, item_id){
    let item_infos = JSON.stringify([item_id, 1, item_id]);
    let card = `<span class="card">
                    <img src='${url}' alt='${title}'>
                    <div class="container">
                        <h3>${title}</h3>
                        <button onclick="itemManagerUrl('prova.php', 'addItem', ${item_infos})">Aggiungi</button>
                    </div>
                </span>`;
    return card;
}

function itemManagerUrl(url, action, item_infos){
    let stringed_item_infos = encodeURIComponent(JSON.stringify(item_infos));
    location = url + "?function=" + action + "&data-item=" + stringed_item_infos;
}

function itemCard(photos){
    document.getElementById("display").innerHTML = "";

    if(photos.length < 25){
        photos.forEach(photo =>{
            document.getElementById("display").innerHTML += cardConstructor(photo.title, photo.url, photo.id);
        })
    }

    else{
        let i = 0;
        let j = 0;
        for (let k = 0; k < photos.length; k++) {
            const photo = photos[k];
            if (i === 0) {
                groupedPhotos[j] = cardConstructor(photo.title, photo.url, photo.id);
            }
            else {
                groupedPhotos[j] += cardConstructor(photo.title, photo.url, photo.id);
            }
            i++;
            if(i === 25){
                i = 0;
                j++;
            }
        }
        document.getElementById("display").innerHTML = groupedPhotos[pagina];
    }
}

const groupedPhotos = [];
let pagina = 0;
getPhotos();