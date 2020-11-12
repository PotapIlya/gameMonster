// class Modal
// {
//
//
//     constructor()
//     {
//         this.modal = document.querySelectorAll('.modal')
//         this.buttons = document.querySelectorAll('.openModal')
//
//
//         this.searchModal();
//     }
//
//     searchModal()
//     {
//         this.buttons.forEach(btn =>{
//             btn.addEventListener('click', () => {
//                 if (document.querySelector(`div[data-type=${btn.dataset.type}]`))
//                 {
//                     this.modal = document.querySelector(`div[data-type=${btn.dataset.type}]`);
//                     this.close = this.modal.querySelector('.close');
//                     this.wrapper = this.modal.querySelector('.modal-wrap');
//
//
//                     this.openModal();
//                     this.closeModal();
//                 }
//
//                 // window.addEventListener('click', (e) =>{
//                 //     if (e.target !== this.wrapper)
//                 //     {
//                 //         console.log(123)
//                 //     }
//                 // })
//
//             })
//         })
//
//
//
//     }
//     openModal()
//     {
//         this.modal.classList.add('d-block')
//     }
//     closeModal()
//     {
//         // if (this.close)
//         // {
//             this.close.addEventListener('click', () => {
//                 this.modal.classList.remove('d-block')
//             })
//         // }
//     }
//
//
//
// }
//
//
// new Modal('potap');
//
