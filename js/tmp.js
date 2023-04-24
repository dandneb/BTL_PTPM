$(".check-box-th").change(function(){
    if($(this).is(':checked')){
        selected.push($(this).val())
        var newArr = myArr.filter(function(item){
            return selected.includes(item.id_thuonghieu)
        })
        if(costs.length > 0){
            newArr = newArr.filter(function(item){
                for(let i = 0; i < costs.length; i++){
                    let cost = costs[i].split("_");
                    if(item.min_gia >= cost[0] && item.min_gia <= cost[1]){
                        return true;
                    }
                }
                return false;
            })
        }
        search_product(newArr)
    }else{
        var index = selected.indexOf($(this).val());
        if (index > -1) {
            selected.splice(index, 1);
        }
        if(selected.length > 0){
            var newArr = myArr.filter(function(item){
                return selected.includes(item.id_thuonghieu)
            })
            if(costs.length > 0){
                newArr = newArr.filter(function(item){
                    for(let i = 0; i < costs.length; i++){
                        let cost = costs[i].split("_");
                        if(item.min_gia >= cost[0] && item.min_gia <= cost[1]){
                            return true;
                        }
                    }
                    return false;
                })
            }
            search_product(newArr)
        }else{
            if(costs.length > 0){
                var newArr = myArr.filter(function(item){
                    for(let i = 0; i < costs.length; i++){
                        let cost = costs[i].split("_");
                        if(item.min_gia >= cost[0] && item.min_gia <= cost[1]){
                            return true;
                        }
                    }
                    return false;
                })
                search_product(newArr)
            }else{
                search_product(myArr)
            }
        }
    }
})
$(".price").change(function(){
    if($(this).is(':checked')){
        costs.push($(this).val())
        var newArr = myArr.filter(function(item){
            for(let i = 0; i < costs.length; i++){
                let cost = costs[i].split("_");
                if(item.min_gia >= cost[0] && item.min_gia <= cost[1]){
                    return true;
                }
            }
            return false;
        })
        if(selected.length > 0){
            newArr = newArr.filter(function(item){
                return selected.includes(item.id_thuonghieu)
            })
        }
        search_product(newArr)
    }else{
        var index = costs.indexOf($(this).val());
        if (index > -1) {
            costs.splice(index, 1);
        }
        if(costs.length > 0){
            var newArr = myArr.filter(function(item){
                for(let i = 0; i < costs.length; i++){
                    let cost = costs[i].split("_");
                    if(item.min_gia >= cost[0] && item.min_gia <= cost[1]){
                        return true;
                    }
                }
                return false;
            })
            
            if(selected.length > 0){
                newArr = newArr.filter(function(item){
                    return selected.includes(item.id_thuonghieu)
                })
                console.log(selected)
            }
            search_product(newArr)
        }else{
            if(selected.length > 0){
                var newArr = newArr.filter(function(item){
                    return selected.includes(item.id_thuonghieu)
                })
                search_product(newArr)
            }else{
                search_product(myArr)
            }
            
        }
    }
})