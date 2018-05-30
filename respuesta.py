CRLF = "\r\n\r\n"

def enviar(puerto):
   if (puerto == 80):
      return "HEAD / HTTP/1.0%s" % (CRLF)
   elif (puerto == 8080):
      return "HEAD / HTTP/1.0%s" % (CRLF)
   else:
      return CRLF
