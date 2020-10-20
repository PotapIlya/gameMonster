if (document.querySelector('.myCrutch'))
{
    const myCrutch = document.querySelectorAll('.myCrutch')
    let xx = () =>{
        myCrutch.forEach(x =>
        {
            if (x.clientHeight > 0)
            {
                x.parentElement.style.height = x.clientHeight+'px'
            }
        })
    }
    xx()

    setTimeout(() =>{
        xx()
    }, 500)
    window.addEventListener('resize', () =>{
        xx();
    })
}