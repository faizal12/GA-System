<html>
<input type="button" value="Close this window" onclick="return quitBox('quit');">
</html>
<script>

function quitBox(cmd)
{   
    if (cmd=='quit')
    {
        open(location, '_self').close();
    }   
    return false;   
}
</script>