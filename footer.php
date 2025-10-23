<p style="text-align:center;">P&D Automação comercial LTDA – Todos direitos reservados</p>
<!-- <p style="text-align:center;"><img src="assets/imagens/tecmobile.jpg" width="100" height="39" alt=""/></p> -->
<script>

    
    let inactivityTime = 10000; // 1 minuto em milissegundos
    let timeout;

    // Função para recarregar a página
    function reloadPage() {
        location.reload();
    }

    // Função para resetar o timer de inatividade
    function resetTimer() {
        clearTimeout(timeout);
        console.log('teste');
        timeout = setTimeout(reloadPage, inactivityTime);
    }

    // Eventos de interação que resetam o timer
    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    document.onkeydown = resetTimer;
    document.onscroll = resetTimer;
    document.onclick = resetTimer;

</script>

</body>
</html>