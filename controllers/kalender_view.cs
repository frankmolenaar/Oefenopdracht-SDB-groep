using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using WebApplication2.Models;

namespace WebApplication2.Controllers
{
    public class kalender_view : Controller
    {
        public ActionResult DeleteAfspraak()
        {
            ViewData["Message"] = "Viewing kalendar!";
            return View();
        }
    }
}