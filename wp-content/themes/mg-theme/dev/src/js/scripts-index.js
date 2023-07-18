//= partials/ajaxRequest.js

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

  const fieldsValues = [
    { price: 390, old_price: 590, value: "Цифровий формат PNG/JPG" },
    { price: 670, old_price: 850, value: "Цифровий формат PNG/JPG + Друк на полотні 20х30" },
    { price: 670, old_price: 850, value: "Цифровий формат PNG/JPG + Друк на полотні 30х40" },
    { price: 790, old_price: 950, value: "Цифровий формат PNG/JPG + Друк на полотні 30х50" },
    { price: 790, old_price: 950, value: "Цифровий формат PNG/JPG + Друк на полотні 40х40" },
    { price: 830, old_price: 1250, value: "Цифровий формат PNG/JPG + Друк на полотні 40х50" },
    { price: 830, old_price: 1250, value: "Цифровий формат PNG/JPG + Друк на полотні 50х50" },
    { price: 890, old_price: 1250, value: "Цифровий формат PNG/JPG + Друк на полотні 40х60" },
    { price: 1100, old_price: 1450, value: "Цифровий формат PNG/JPG + Друк на полотні 50х70" },
    { price: 1340, old_price: 1650, value: "Цифровий формат PNG/JPG + Друк на полотні 60х80" },
  ]

  const sizeSelect = document.getElementById('size')
  sizeSelect.addEventListener('change', e => {
    const priceValue = fieldsValues.find(obj => obj.value === e.target.value)
    document.querySelector('.disney__price').innerHTML = `₴${priceValue.price.toFixed(2)} <strike>₴${priceValue.old_price.toFixed(2)}</strike>`
  })

  const openPopup = document.querySelector('.openPopup')
  openPopup.addEventListener('click', e => {
    e.preventDefault()
    const sizeFieldValue = document.getElementById('size').value
    document.querySelector('.field__popup').classList.add('active')
    document.querySelector('.field__size').innerHTML = sizeFieldValue
    document.querySelector('.field__count').innerHTML = document.getElementById('count').value
    const priceValue = fieldsValues.find(obj => obj.value === sizeFieldValue)
    document.querySelector('.field__price').innerHTML = `₴ ${ priceValue.price.toFixed(2) }`
    disableScroll()
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










