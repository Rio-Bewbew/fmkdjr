
import os
import glob
import re

files = glob.glob("*.php") + glob.glob("components/*.php")

for f in files:
    with open(f, "r", encoding="utf-8") as file:
        content = file.read()
    
    # Remove opaque backgrounds
    content = re.sub(r"\bbg-accent-light\b", "bg-transparent", content)
    
    # Text color conversions
    content = re.sub(r"\btext-navy\b", "text-white", content)
    content = re.sub(r"\btext-slate-800\b", "text-gray-100", content)
    content = re.sub(r"\btext-gray-600\b", "text-gray-300", content)
    content = re.sub(r"\btext-gray-500\b", "text-gray-400", content)
    
    # Change solid bg-white to translucent glass
    # Only if it is not already bg-white/xx
    content = re.sub(r"\bbg-white(?![/a-zA-Z0-9\-])\b", "bg-white/5 backdrop-blur-md border border-white/10 text-white", content)
    
    with open(f, "w", encoding="utf-8") as file:
        file.write(content)

print("Updated files to dark mode!")

