
// variaveis globais

let nav = 0
let clickedDate = null
let events = localStorage.getItem('events') ? JSON.parse(localStorage.getItem('events')) : []

let newDisponibilidades = {}

// variavel do modal:
const newEventModal = document.getElementById('novaDisponibilidadeMenu')
const deleteEventModal = document.getElementById('deleteEventModal')
const backDrop = document.getElementById('modalBackDrop')
const buttonSave = document.getElementById('saveButtonDisponibilidade')
// const eventTitleInput = document.getElementById('eventTitleInput')
// --------
const calendar = document.getElementById('calendar') // div calendar:
const weekdays = ['domingo','segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 'sábado'] //array with weekdays:

//funções

function openModal(event, date){
  const rect = event.target.parentNode.getBoundingClientRect()
  const mousePosX = event.clientX - rect.left
  const mousePosY = event.clientY - rect.height - rect.top

  clickedDate = date
  const eventDay = events.find((event)=>event.date === clickedDate)
 

  if (eventDay){
   document.getElementById('eventText').innerText = eventDay.title
   deleteEventModal.style.display = 'block'
  } else{
    newEventModal.style.display = 'block'
    newEventModal.style.left = mousePosX + "px"
    newEventModal.style.top = mousePosY  + "px"
  }

  // backDrop.style.display = 'block'
}

function clickModalMenu(disponibilidateType) {
  // Muda cor e grava disponibilidade "localmente"
  newDisponibilidades[clickedDate] = disponibilidateType

  const disponibilidateTypes = ['manha', 'tarde', 'dia-todo', 'indisponivel', 'ferias']

  for (let i = 0; i < calendar.childElementCount; i++){
    if (calendar.childNodes[i].getAttribute('date') == clickedDate){
      calendar.childNodes[i].classList.remove(...disponibilidateTypes)
      calendar.childNodes[i].classList.add(disponibilidateType)
    }
  }
}

function saveDisponibilidades(){
  // newDisponibilidades= {data1: 'tarde', data2: 'manha', ...}
  // iterar por cada par data: periodo
  // enviar  o request para o endpoint addDisponibilidade


  let user_id = document.getElementById('userId').getAttribute('value')

  let requests = []
  for (let data in newDisponibilidades){
    let periodo = newDisponibilidades[data]
    
    let url = buttonSave.getAttribute('action')
    requests.push(fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').getAttribute('value') 
      },
      body: JSON.stringify({
        'data_inicio':data,
        'periodo':periodo,
        'users_id':user_id
      })
    }).then(response => {
      if (!response.ok) {
        throw new Error('Erro ao enviar os dados.');
      }
      // console.log(response);
      return response.status;
    }))
    
  }
  Promise.all(requests)
  .then(data => {
    console.log('Dados enviados com sucesso:', data);
    location.reload() 
  })
  .catch(error => {
    console.error('Erro ao enviar os dados:', error.message);
  });
}

//função load() será chamada quando a pagina carregar:
function load (){ 
  console.log("Entered Load")
  const date = new Date() 
  

  //mudar titulo do mês:
  if(nav !== 0){
    date.setMonth(new Date().getMonth() + nav) 
  }
  
  const day = date.getDate()
  const month = date.getMonth()
  const year = date.getFullYear()

  
  
  const daysMonth = new Date (year, month + 1 , 0).getDate()
  const firstDayMonth = new Date (year, month, 1)
  

  const dateString = firstDayMonth.toLocaleDateString('pt-br', {
    weekday: 'long',
    year:    'numeric',
    month:   'numeric',
    day:     'numeric',
  })
  

  const paddinDays = weekdays.indexOf(dateString.split(', ') [0])
  
  //mostrar mês e ano:
  document.getElementById('monthDisplay').innerText = `${date.toLocaleDateString('pt-br',{month: 'long'})}, ${year}`

  
  calendar.innerHTML =''
  
  let disp = JSON.parse(document.getElementById('disp').getAttribute('value'))

  // cria uma div com os dias:

  for (let i = 1; i <= paddinDays + daysMonth; i++) {
    const dayS = document.createElement('div')
    dayS.classList.add('day')

    let month2Digits = (month + 1).toLocaleString('en-US', {
      minimumIntegerDigits: 2,
      useGrouping: false
    })
    let days2Digits = (i - paddinDays).toLocaleString('en-US', {
      minimumIntegerDigits: 2,
      useGrouping: false
    })
    const dayString = `${year}-${month2Digits}-${days2Digits}`

    //condicional para criar os dias de um mês:
     
    if (i > paddinDays) {
      dayS.innerText = i - paddinDays
      dayS.setAttribute('date', dayString)
      
      const eventDay = events.find(event=>event.date === dayString)
      
      if(i - paddinDays === day && nav === 0){
        dayS.id = 'currentDay'
      }


      //mudar cor dia (de acordo com disponibilidade)
      // Itera pelas disponibilidades que vieram da base de dados
      // Se existir uma para este dia X, marca o dia com essa classe
      for (let dispX of disp){

        if (dispX['data_inicio'] == dayString) {
          dayS.classList.add(dispX['periodo'])
        }
      }

      dayS.addEventListener('contextmenu', (ev)=> {
        ev.preventDefault()
        openModal(ev, dayString)
      })

    } else {
      dayS.classList.add('padding')
    }

    
    calendar.appendChild(dayS)
  }
}

function closeModal(){
  // eventTitleInput.classList.remove('error')
  newEventModal.style.display = 'none'
  // backDrop.style.display = 'none'
  deleteEventModal.style.display = 'none'

  // eventTitleInput.value = ''
  clickedDate = null
  // load()

}
function saveEvent(){
  if(eventTitleInput.value){
    eventTitleInput.classList.remove('error')

    events.push({
      date: clickedDate,
      title: eventTitleInput.value
    })

    localStorage.setItem('events', JSON.stringify(events))
    closeModal()

  }else{
    eventTitleInput.classList.add('error')
  }
}

function deleteEvent(){

  events = events.filter(event => event.date !== clickedDate)
  localStorage.setItem('events', JSON.stringify(events))
  closeModal()
}

// botões 

function buttons (){
  document.getElementById('backButton').addEventListener('click', ()=>{
    nav--
    load()
    
  })

  document.getElementById('nextButton').addEventListener('click',()=>{
    nav++
    load()
    
  })

  // document.getElementById('saveButton').addEventListener('click',()=> saveEvent())

  // document.getElementById('cancelButton').addEventListener('click',()=>closeModal())

  document.getElementById('deleteButton').addEventListener('click', ()=>deleteEvent())

  document.getElementById('closeButton').addEventListener('click', ()=>closeModal())
  
}
buttons()
load()

