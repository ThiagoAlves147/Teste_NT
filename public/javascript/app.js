let validar = {
    handleSubmit:(event) => {
        event.preventDefault()
        let send =true
        let inputs = form.querySelectorAll('.select')
        validar.clearError()

        for(let values of inputs){
            let input = values
            let check = validar.checkInput(input)

            if(check !== true){
                send = false
                validar.showError(input, check)
            }
        }

        if(send){
            form.submit()
        }
        
    },

    checkInput:(input) => {
        let rules = input.getAttribute('data-rules')
        if(rules !== null){
            rules = rules.split('/')
            for(let i in rules){
                let detalhes = rules[i].split('=')
                switch(detalhes[0]){
                    case 'required':
                        if(input.value.trim() == ''){
                            return 'Este campo é obrigátorio'
                        }
                    break
                    case 'min':
                        if(input.value < detalhes[1]){
                            return 'Tempo precisar ser maior que 0'
                        }
                    break
                }
            }
        }
        return true
    },

    showError:(input, error) => {
        input.style.borderColor = 'red'

        let errorElement = document.createElement('div')
        errorElement.classList.add('error')
        errorElement.innerHTML = error

        input.parentElement.insertBefore(errorElement, input.ElementSibling)
    },

    clearError:() => {
        let inputs = form.querySelectorAll('input')
        for(let value of inputs){
            value.style = ''
        }

        let errorElement = document.querySelectorAll('.error')
        for(let value of errorElement){
            value.remove()
        }

    }
}

let form = document.querySelector('.validate')

form.addEventListener('submit', validar.handleSubmit)