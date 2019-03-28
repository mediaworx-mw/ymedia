const toggleClass = (e, c) => {
  e.classList.contains(c) ? e.classList.remove(c) : e.classList.add(c);
}

export default toggleClass;
