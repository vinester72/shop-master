
var siteURL = 'http://shop-master.local/';
// переменная кнопки "показать ещё ..."
var btnShowMore = document.querySelector('#show-more');
if(btnShowMore) {
	// функция клика на кнопку "показать ещё ..."
	btnShowMore.onclick = function() {
		// создаём переменную для отправки запроса
		var currentPageInput = document.querySelector('#current-page');
		console.log(currentPageInput);
		// ajax запрос
		var ajax = new XMLHttpRequest();
			ajax.open('GET', siteURL + 'modules/products/get-more.php?page=' + currentPageInput.value, false);
			ajax.send();
		console.dir(ajax);
		// при клике значение currentPageInput добавляем 1
		currentPageInput.value = +currentPageInput.value + 1;
		//если в ответе окажется пустота то
		if(ajax.response == '') {
			//убираем кнопку
			btnShowMore.style.display = 'none';
		}
		//выводим кол-во карточек на странице
		var productsBlock = document.querySelector('#products-block');
			productsBlock.innerHTML =  productsBlock.innerHTML + ajax.response;

			
	}
}


	

// функция добавления товара в корзину
function addToBasket(btn) {
	// console.dir(btn.dataset.id);
		alert("Добавить в корзину?");
	/*
		1. Сделать аякс запрос на добавление в корзину +
		2. Получить данные об успешном добавлении в корзину +
		3. Обновить информацию в корзине +
	*/

	var ajax = new XMLHttpRequest();
		ajax.open("POST", siteURL + "/modules/basket/add-basket.php", false);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send("id=" + btn.dataset.id);

	// преобразуем формат строки в JSON (формат оъекта)	
    var response = JSON.parse(ajax.response);
    	// console.dir(response);
    // переменная корзины	
	var btnGoBasket = document.querySelector("#go-basket span");
		//обновляем кол-во записей в корзину
		btnGoBasket.innerText = response.count;
		// btnGoBasket.innerHTML = response.count;
	console.dir(response.count);	
}


// Удаление товара из корзины

function deleteProductBasket(obj, id) {
	console.dir(obj.parentNode.parentNode);	
	var ajax = new XMLHttpRequest();
		ajax.open("POST", siteURL + "/modules/basket/delete.php", false);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send("id=" + id);

		alert("Product deleted");

	// Удалить строку с товаром	
	obj.parentNode.parentNode.remove();
	
}
	
// изменение количества товаров в корзине	

function countesFormOfBasket(form, id) {
	// alert("The form was submitted"); 
	console.dir(this);
	
	var countProducts = "id=" + id +
							"&count=" + form.count.value;

	var ajax = new XMLHttpRequest();
		ajax.open("POST", siteURL + "/modules/basket/count-products.php", false);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send(countProducts);
		// console.dir(ajax);
		// alert("change quantity?");
}


