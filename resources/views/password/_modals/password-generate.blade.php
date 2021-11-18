<button id="modal-btn" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Gerador de Senhas</button>

<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gerador de Senhas</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="el">
                        <input id="quantity" class="qnt" style="width: 15%" type="number"
                            placeholder="Quantidade de Caracteres" min="8">
                        <input id="password" class="inp" type="text" placeholder="Senha">
                        <button class="btn btn-secondary ml-2" onclick="generatePassword()" title="Gerar">Gerar</button>
                        <button class="btn btn-primary ml-2" onclick="copytext()" title="Copiar">Copiar</button>
                    </div>
                </div>
                <div class="info"
                    style="color:white;margin-top:40px; background:gray; width:200px; padding:12px; opacity:0; text-align:center; transition:0.15s; animation:slideIn 1.5s linear forwards; border-radius:5px">
                    Copiado para a área de trabalho</div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("modal-btn").value = "";
    const info = document.querySelector(".info");
    const passfield = document.querySelector("#password");
    let password = "";

    function generatePassword() {
        password = "";
        const qntfield = document.querySelector("#quantity");
        let length = qntfield.value;
        if (length < 8)
            length = 8;
        let chars = `abcdefghijklmnopqrstuvxywzABCDEFGHIJKLMNOPQRSTUVXYWZ0123456789!@#$%^&*`;
        let n = chars.length;
        for (var i = 0; i < length; ++i) {
            password += chars.charAt(Math.floor(Math.random() * n));
        }
        passfield.value = password;
    }

    // function copytext() {
    //     navigator.clipboard.writeText(password);
    //     info.style.opacity = "1";
    //     setTimeout(function() {
    //         info.style.opacity = "0"
    //     }, 1500)
    // }
    
    async function copytext() {
        try {
        await navigator.clipboard.writeText(password);
        info.style.opacity = "1";
        setTimeout(function() {
            info.style.opacity = "0"
        }, 1500)
        } catch (err) {
        console.error('Failed to copy: ', err);
        }
    }
</script>
