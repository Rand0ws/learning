let hero = document.getElementById('hero'),
    laser = document.getElementById('laser')
console.log(hero)
console.log(laser)

laser.classList.remove('laser')

function scan()
{
    hero.classList.remove('idle')
    hero.classList.add('attack')
    laser.classList.add('laser') 

    setTimeout(function() {
        hero.classList.remove('attack')
        hero.classList.add('idle')
        laser.classList.remove('laser')
    }, 3000)
}

setInterval(scan, 10000);