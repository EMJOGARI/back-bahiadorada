const handleMenuBarExpanded = () =>{
    localStorage.setItem('tradeGoMenuBar', 1);
}

const handleMenuBarCollapsed = () =>{
    localStorage.setItem('tradeGoMenuBar', 0);
}

function menuBarStatus(){
    const status =  localStorage.getItem('tradeGoMenuBar');
    if(status){
        if(status == 0){
            $('.sidebar-mini').addClass('sidebar-collapse');
        }else if(status == 1){
            $('.sidebar-mini').removeClass('sidebar-collapse');
        }else{
            localStorage.removeItem('tradeGoMenuBar');
            $('.sidebar-mini').removeClass('sidebar-collapse');
        }
        return true;
    }
    $('.sidebar-mini').removeClass('sidebar-collapse');
    return true;
}

$(document).on('expanded.pushMenu', handleMenuBarExpanded);
$(document).on('collapsed.pushMenu', handleMenuBarCollapsed);

menuBarStatus();
