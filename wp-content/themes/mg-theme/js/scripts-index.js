function requestAction(values, callback){
	let formData = new FormData();

	for (let i = 0, l = values.length; i < l; i++) {
		var keys = Object.keys(values[i]);
		for (var j = 0, k = keys.length; j < k; j++) {
			let key = keys[j],
				value = values[i][keys[j]];
			formData.append(key, value);
		}
	}

	let request = new XMLHttpRequest();
	request.open('POST', data.ajax, true);
	request.onload = function() {
		if (this.status >= 200 && this.status < 400) {
			let result = this.response;
			if(callback) callback(result);
		} else {
			alert('Request status: '+this.status);
		}
	}

	request.onerror = function() {
		alert('Request error!');
	};

	request.send(formData);
}

(function(){

  const scrolls = document.querySelectorAll('.scroll')
  scrolls.forEach(el => {
    el.addEventListener('click', e => {
      e.preventDefault()
      document.getElementById(e.target.dataset.id).scrollIntoView({block: "start", behavior: "smooth"})
    })
  })

  const galleryImages = document.querySelectorAll('.disney__nav img')
  galleryImages.forEach(el => {
    el.addEventListener('click', e => {
      e.preventDefault()
      document.querySelector('.disney__image').src = e.target.src
      galleryImages.forEach(em => em.classList.remove('active'))
      e.target.classList.add('active')
    })
  })

  const modalOpen = document.querySelectorAll('.modalOpen')
  modalOpen.forEach(el => {
    el.addEventListener('click', e => {
      e.preventDefault()
      disableScroll()
      document.querySelector(`.modal__${e.target.dataset.modal}`).classList.add('active')
    })
  })

  const closeModal = document.querySelectorAll('.modalClose')
  closeModal.forEach(el => {
    el.addEventListener('click', e => {
      e.preventDefault()
      enableScroll()
      document.querySelector('.modal').classList.remove('active')
    })
  })

  const disableScroll = () => {
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
    window.onscroll = function() {
      window.scrollTo(scrollLeft, scrollTop);
    };
  }

  const enableScroll = () => {
    window.onscroll = function() {};
  }

  setTimeout(()=>{
    let sizeNew
    fieldsValues.forEach(val => {
      sizeNew += `<option value="${val.name}">${val.name}</option>`
    })
    document.getElementById('size').innerHTML = sizeNew
  }, 1000);

  const sizeSelect = document.getElementById('size')
  sizeSelect.addEventListener('change', e => {
    const priceValue = fieldsValues.find(obj => obj.name == e.target.value);
    document.querySelector('.disney__price').innerHTML = `₴${Number(priceValue.price).toFixed(2)} <strike>₴${Number(priceValue.old_price).toFixed(2)}</strike>`;
  })

  const openPopup = document.querySelector('.openPopup')
  openPopup.addEventListener('click', e => {
    e.preventDefault()
    if(document.getElementById('images').value){
      const sizeFieldValue = document.getElementById('size').value
      document.querySelector('.field__popup').classList.add('active')
      document.querySelector('.field__size').innerHTML = sizeFieldValue
      document.querySelector('.field__count').innerHTML = document.getElementById('count').value
      const priceValue = fieldsValues.find(obj => obj.name == sizeFieldValue)
      document.querySelector('.field__price').innerHTML = `₴ ${ Number(priceValue.price).toFixed(2) }`
      disableScroll()
    } else {
      document.querySelector('label[for="images"]').style.color = 'red'
      setTimeout(()=>{
        document.querySelector('label[for="images"]').style.color = 'var(--dark)'
      }, 1000);
    }
  })

  const fieldsClose = document.querySelector('.fieldsClose')
  fieldsClose.addEventListener('click', e => {
    document.querySelector('.field__popup').classList.remove('active')
    enableScroll()
  })

  const wpcf7Elm = document.querySelector( '.wpcf7' )
  wpcf7Elm.addEventListener( 'wpcf7submit', event => {
    fbq('track', 'Lead')
    document.querySelector('.field__popup').classList.remove('active')
    enableScroll()
  }, false )

})();