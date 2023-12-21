function mudarCor(id){
    document.getElementsByClassName('select')[id].style.cssText = 'color: rgba(255, 255, 255, 1); transition: 0.3s;'
    
}

function desmudarCor(id){
    document.getElementsByClassName('select')[id].style.cssText = 'color: rgba(255, 255, 255, 0.7); transition: 0.3s;'
}

// document.getElementsByClassName('aba-lateral')[0].style.cssText = 'min-height: 100vh'