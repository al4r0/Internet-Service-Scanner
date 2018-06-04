CRLF = "\r\n\r\n"

def enviar(puerto):
   if (puerto == 80):
      return "GET / HTTP/1.0%s" % (CRLF)
   elif (puerto == 8080):
      return "GET / HTTP/1.0%s" % (CRLF)
   else:
      return CRLF
